<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Player;
use App\Models\UserStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        // Fixin'/Previne Error
        if(is_null($row['nome_completo_aluno'])){
            return;
        }

        // Default Variables
        $hasError = false;

        // First Check of Student Slots
        $school_limit = 15;
        $school_id = Auth::id();
        $school_students = getStudentBySchoolId($school_id);

        // Check if School has slot to add new Student
        if(count($school_students) >= $school_limit)
        {
            Alert::warning("Limite Excedido!", "Alguns alunos foram cadastrados porém o limite de aluno excedeu e a lista não foi completamente inserida.\nÚltimo aluno inserido foi: " . $row['nome_completo_aluno'], 15000);
            return redirect()->route('users.students.import_massive');
        }

        // Treatment of User Informations
        $student_name = $row['nome_completo_aluno'];
        $cpf_student = $row['cpf_aluno'];
        $cpf_unmasked = doRemoveSpecialCharacters($cpf_student, false);
        $rg_student = $row['rg_aluno'];
        $rg_unmasked = doRemoveSpecialCharacters($rg_student, false);
        $student_gender = $row['genero_aluno'];
        $student_gender_id = getGender($student_gender)->id;
        $user_email = $row['e_mail_aluno'];

        // Birthday Convert
        $birthday_student_xls = $row['data_de_nasc_aluno'];
        $birth_calc = ($birthday_student_xls - 25569) * 86400;
        $birthday = gmdate("Y-m-d", $birth_calc);
        $birth_calc_resp = ($row['data_de_nasc_resp'] - 25569) * 86400;
        $birthday_resp = gmdate("Y-m-d", $birth_calc_resp);

        // School / Student Info
        $registration_id = $row['no_da_matricula'];
        $student_group = $row['serie'];

        // Resp Informations
        $cpf_resp = $row['cpf_resp'];
        $cpf_resp_unmasked = doRemoveSpecialCharacters($cpf_resp, false);
        $rg_resp = $row['rg_resp'];
        $rg_resp_unmasked = doRemoveSpecialCharacters($rg_resp, false);
        $tel_ramal_commercial = $row['ramal_trab'] ? doRemoveSpecialCharacters($row['ramal_trab'], false) : null;

        // Generate the Password by unmasked CPF
        $user_password = Hash::make($cpf_unmasked);

        // Check if Exists Register with This Informations
        $check = [
            'users' => [
                'email' => $user_email
            ],
            'users_students' => [
                'cpf' => $cpf_unmasked,
                'rg' => $rg_unmasked,
                'registration' => $registration_id
            ],
        ];

        foreach ($check as $key => $value) {
            foreach ($value as $k => $v) {
                $verify = getDBInfoByValue($key, [$k => $v]);
                if($verify)
                {
                    $hasError = "Est" . doTranslateColumnName($k, true) . " já está cadastrado em nosso sistema.";
                    break;
                }
            }
            if($hasError) { break; }
        }
        
        // Check if are Valids Informations
        $groupId = doConvertSerieToGroupId($student_group);
        if(empty($student_name)){
            $hasError = "O campo nome do aluno não pode estar em branco.";
        } else if(!$hasError && !doCheckCPF($cpf_unmasked)){
            $hasError = "O CPF deste aluno não é válido.";
        } else if(!$hasError && strlen($rg_unmasked) != 9){
            $hasError = "O RG deste aluno não é válido.";
        } else if(!$hasError && empty($user_email)){
            $hasError = "É necessário um e-mail para cadastrar este aluno.";
        } else if(!$hasError && empty($birthday_student_xls)){
            $hasError = "É necessário declarar a data de nascimento para cadastrar este aluno.";
        } else if(!$hasError && empty($student_gender)){
            $hasError = "É necessário declarar o gênero para cadastrar este aluno.";
        } else if(!$hasError && empty($registration_id)){
            $hasError = "É necessário declarar o Nº da Matrícula do aluno na Escola.";
        } else if(!$hasError && empty($student_group)){
            $hasError = "É necessário declarar a série do aluno.";
        }

        $register_log = [
            'sponsor_id' => $school_id,
            'name' => $student_name,
            'cpf' => $cpf_unmasked,
            'rg' => $rg_unmasked,
            'email' => $user_email,
            'excel_doc' => null,
            'date' => gmdate("Y-m-d")
        ];

        if(!$hasError)
        {
            DB::beginTransaction();
            // Create User Register
            $user_array = [
                // User Info
                'sub_id' => 0, // Id (AI) da Plataforma Matriz
                'profile_id' => 5,
                'name' => $student_name,
                'email' => $row['e_mail_aluno'],
                'password' => $user_password
            ];
            // $userId = 0;
            $userId = User::insertGetId($user_array);

            // Create Student Register
            $student_array = [
                'school_id' => $school_id,
                'name' => $student_name,
                'cpf' => $cpf_unmasked,
                'rg' => $rg_unmasked,
                'birthday' => $birthday,
                'gender_id' => $student_gender_id,
                'email' => $user_email,
                'celphone' => doRemoveSpecialCharacters($row['celular_aluno']),
                'cep' => doRemoveSpecialCharacters($row['cep_aluno']),
                'street' => $row['endereco_aluno'],
                'number' => setToJustNumber($row['numero_aluno']),
                'complement' => $row['complemento_aluno'],
                'district' => $row['bairro_aluno'],
                'city' => $row['cidade_aluno'],
                'state' => $row['estado_aluno'],
                'country' => $row['pais_aluno'],

                // School Informations
                'registration' => setToJustNumber($registration_id),
                'group' => setToJustNumber($student_group),
                'class' => strtoupper($row['compl_serie']),

                // Responsible Informations
                'name_resp' => $row['nome_completo_resp'],
                'cpf_resp' => $cpf_resp_unmasked,
                'rg_resp' => $rg_resp_unmasked,
                'birthday_resp' => $birthday_resp,
                'gender_id_resp' => getGender($row['genero_resp'])->id,
                'parentage_id' => doConvertParentage($row['parentesco']),
                'telephone_resp' => doRemoveSpecialCharacters($row['telefone_resp']),
                'celphone_resp' => doRemoveSpecialCharacters($row['celular_resp']),
                'email_resp' => $row['e_mail_resp'],

                // Business Informations
                'company_name' => $row['nome_da_empresa'],
                'tel_commercial' => doRemoveSpecialCharacters($row['telefone_trab']),
                'ramal_commercial' => $tel_ramal_commercial,
                'cep_commercial' => doRemoveSpecialCharacters($row['cep_trab']),
                'street_commercial' => $row['endereco_trab'],
                'district_commercial' => $row['bairro_trab'],
                'number_commercial' => setToJustNumber($row['numero_trab']),
                'complement_commercial' => $row['complemento_trab'],
                'city_commercial' => $row['cidade_trab'],
                'state_commercial' => $row['estado_trab'],
                'country_commercial' => $row['pais_trab'],
                'status' => 1
            ];
            $student_array["user_id"] = $userId;
            UserStudent::create($student_array);

            // Create Player Register
            $player_array = [
                'description' => "",
                'comment' => "",
                'profile_id' => 5,
                'group_id' => $groupId,
                'gender_id' => $student_gender_id,
                'level' => 1,
                'status' => 1,
                'vocation_id' => 1,
                'career' => 0,
                'balance_money' => 0,
                'balance_coin' => 0,
                'outfit_id' => 0,
                'health' => 0,
                'health_max' => 0,
                'mana' => 0,
                'mana_max' => 0,
                'energy' => 0,
                'energy_max' => 0,
                'login_last' => null,
                'logout_last' => null,
                'ip_last' => 0,
                'friend_list' => null,
                'pos_x' => 0,
                'pos_y' => 0,
                'pos_z' => 0,
                'name_old' => null,
                'payment_status' => 0,
                'ban_id' => null
            ];
            $first_name = explode(" ", $student_name)[0];
            $player_name = doNicknameGenerate($userId, $first_name);
            $player_array += [
                "user_id" => $userId,
                "name" => $player_name
            ];
            Player::create($player_array);

            $register_log += [
                'user_id' => $userId,
                'message' => "Usuário inserido com sucesso.",
                'status' => 1
            ];
            DB::commit();

            Alert::success("Cadastro(s) Inserido(s)!", "Acompanhe a relação de cadastros.", 5000);
        
        } else {
            $register_log += [
                'user_id' => null,
                'message' => $hasError,
                'status' => 0
            ];

            Alert::warning("Algo deu errado!", "Acompanhe a relação de cadastros inseridos e com erros.", 5000);
        }

        // Registerin' the Result on Log Table
        doUserRegisterInsertLog($register_log);

        return;
    }
}
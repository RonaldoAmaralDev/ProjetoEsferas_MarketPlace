<?php

// use Maatwebsite\Excel\Excel;
use App\Models\User;
use App\Models\Player;
use App\Models\UserStudent;
use App\Models\UserUploads;
use App\Models\UserRegisterLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


define('TRANSLATE_COLUMN_NAMES', 
    array(
        'school_id' => ['article' => 'a', 'translate' => 'identificação da Escola'],
        'name' => ['article' => 'e', 'translate' => 'nome'],
        'birthday' => ['article' => 'a', 'translate' => 'data de nascimento'],
        'gender_id' => ['article' => 'a', 'translate' => 'id do gênero'],
        'cpf' => ['article' => 'e', 'translate' => 'cpf'],
        'rg' => ['article' => 'e', 'translate' => 'rg'],
        'email' => ['article' => 'e', 'translate' => 'e-mail'],
        'celphone' => ['article' => 'e', 'translate' => 'nº do celular'],

        'cep' => ['article' => 'e', 'translate' => 'cep'],
        'street' => ['article' => 'e', 'translate' => 'logradouro'],
        'number' => ['article' => 'e', 'translate' => 'número do imóvel'],
        'complement' => ['article' => 'e', 'translate' => 'complemento'],
        'district' => ['article' => 'e', 'translate' => 'bairro'],
        'city' => ['article' => 'a', 'translate' => 'cidade'],
        'state' => ['article' => 'e', 'translate' => 'estado'],
        'country' => ['article' => 'e', 'translate' => 'país'],

        'registration' => ['article' => 'a', 'translate' => 'matrícula'],
        'group' => ['article' => 'a', 'translate' => 'série'],
        'class' => ['article' => 'a', 'translate' => 'classe'],

        'name_resp' => ['article' => 'e', 'translate' => 'nome do responsável'],
        'cpf_resp' => ['article' => 'e', 'translate' => 'cpf do responsável'],
        'rg_resp' => ['article' => 'e', 'translate' => 'rg do responsável'],
        'birthday_resp' => ['article' => 'a', 'translate' => 'data de nascimento do responsável'],
        'gender_id_resp' => ['article' => 'a', 'translate' => 'id do gênero do responsável'],
        'parentage_id_resp' => ['article' => 'a', 'translate' => 'id de parentesco do responsável'],
        'telephone_resp' => ['article' => 'e', 'translate' => 'nº do telefone do responsável'],
        'celphone_resp' => ['article' => 'e', 'translate' => 'nº do celular do responsável'],
        'email_resp' => ['article' => 'e', 'translate' => 'e-mail do responsável'],

        'company_name' => ['article' => 'e', 'translate' => 'nome da empresa na qual trabalho o responsável'],
        'tel_commercial' => ['article' => 'e', 'translate' => 'telefone do local de trabalho do responsável'],
        'ramal_commercial' => ['article' => 'e', 'translate' => 'ramal do telefone do local de trabalho do responsável'],        
        'cep_commercial' => ['article' => 'e', 'translate' => 'cep do endereço do local de trabalho do responsável'],
        'street_commercial' => ['article' => 'e', 'translate' => 'logradouro do endereço do local de trabalho do responsável'],
        'number_commercial' => ['article' => 'e', 'translate' => 'número do imóvel de local de trabalho do responsável'],
        'complement_commercial' => ['article' => 'e', 'translate' => 'complemento do imóvel de local de trabalho do responsável'],
        'city_commercial' => ['article' => 'a', 'translate' => 'cidade do local de trabalho do responsável'],
        'state_commercial' => ['article' => 'e', 'translate' => 'estado do local de trabalho do responsável'],
        'country_commercial' => ['article' => 'e', 'translate' => 'país do local de trabalho do responsável'],

        'status' => ['article' => 'e', 'translate' => 'status'],
        'deleted_at' => ['article' => 'e', 'translate' => 'deletado em'],
        'created_at' => ['article' => 'e', 'translate' => 'criado em'],
        'updated_at' => ['article' => 'e', 'translate' => 'atualizado em']
    )
);

if(!function_exists('doCheckCPF'))
{
    function doCheckCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf);
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;    
    }
}

if(!function_exists('doRemoveSpecialCharacters'))
{
    function doRemoveSpecialCharacters($str, $keepLetters = true, $keepNumbers = true, $subs = false)
    {
        $str = str_replace(' ', '', $str);
        $str = str_replace('-', '', $str);
        $str = preg_replace('/[^'.($keepLetters ? 'A-Za-z' : '') . ($keepNumbers ? '0-9' : '').'-]/', ($subs ? $subs : ''), $str);
        return $str;
    }
}

if(!function_exists('setToJustNumber'))
{
    function setToJustNumber($value)
    {
        $value = doRemoveSpecialCharacters($value);
        return number_format((int) $value, 0, "", "");
    }
}

if(!function_exists('getDBInfoByValue'))
{
    function getDBInfoByValue($table, $array)
    {
        $return = false;
        $get = DB::table($table)->where($array)->get();
        if(isset($get[0])) { $return = $get; }
        return $return;
    }
}

if(!function_exists('doNicknameGenerate'))
{
    function doNicknameGenerate($id, $first_name)
    {
        $nickname = $first_name . " ";
        $nickname .= ucfirst(hash("crc32", $id));

        return $nickname;
    }
}

if(!function_exists('doConvertSerieToGroupId'))
{
    function doConvertSerieToGroupId($serie)
    {
        if($serie <= 3)
        {
            $group = 1;
        }
        else if($serie > 3 && $serie <= 5)
        {
            $group = 2;
        }
        else if($serie > 5 && $serie <= 7)
        {
            $group = 3;
        }
        else if($serie > 8)
        {
            $group = 4;
        }
        return $group;
    }
}

if(!function_exists('getGender'))
{
    function getGender($var = null)
    {
        $return = 0;
        if(isset($var)) {
            if(is_numeric($var)){
                $return = DB::table('genders')->whereId($var)->where("status", 1)->get()[0];
            } else {
                $return = DB::table('genders')->whereName(strtolower($var))->where("status", 1)->get()[0];
            }
        } else {
            $return = DB::table('genders')->where("status", 1)->get();
        }        
        return $return;
    }
}

if(!function_exists('getParentage'))
{
    function getParentage($id = null)
    {
        if(isset($id)) {
            $return = DB::table('parentage')->whereId($id)->where("status", 1)->get();
        } else {
            $return = DB::table('parentage')->where("status", 1)->get();
        }        
        return $return;
    }
}

if(!function_exists('doTranslateColumnName'))
{
    function doTranslateColumnName($name, $article = false)
    {
        $return = "Unnamed";
        $get = TRANSLATE_COLUMN_NAMES[$name];
        if(isset($get)){
            $return = ($article ? $get['article'].' ' : ' ') . $get['translate'];
        }
        return $return;
    }
}

if(!function_exists('doConvertParentage'))
{
    function doConvertParentage($parentage)
    {
        $return = "Indefinido";
        switch (strtolower($parentage)) {
            case 'mãe':
            case 'mae':
            case 'pai':
                $return = 1;
                break;
            
            case 'tio':
            case 'tia':
                $return = 2;
                break;
            
            case 'avô':
            case 'avo':
            case 'vô':
            case 'vó':
            case 'avó':
                $return = 3;
                break;
            
            case 'bisavó':
            case 'bisavô':
            case 'bisavo':
                $return = 4;
                break;
            
            default:
                $return = 5;
                break;
        }  
        return $return;
    }
}

if(!function_exists('getStudentBySchoolId'))
{
    function getStudentBySchoolId($schoolId)
    {
        $return = DB::table('users_students')->whereSchoolId($schoolId)->get();
        return $return;
    }
}

if(!function_exists('doInsertUserRegisterLog'))
{
    function doUserRegisterInsertLog($array)
    {
        UserRegisterLog::create($array);
    }
}

if(!function_exists('doInsertUserUploadLog'))
{
    function doInsertUserUploadLog($array)
    {
        UserUploads::create($array);
    }
}
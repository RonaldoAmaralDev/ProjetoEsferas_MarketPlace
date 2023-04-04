<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Clientes;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = Clientes::whereStatus('Ativo')->get();


        return view('clientes.index', compact('clientes'));
    }


    public function NovoCliente() {

        return view('clientes.novocliente');

    }

    public function ClienteAdd(Request $request) {

        $carbon= Carbon::now();

        //Verifica se já existe um e-mail cadastrado
        $verifica = Clientes::whereEmail($request->get('novocliente_email'))->count();

        if($verifica > 0) {

            Alert::error('Erro!', 'Já existe um registro cadastrado com este e-mail.');

        }

        //Insert na tabela produtos
            $values = array(
              'nome' => $request->get('novocliente_nome'),
              'email' => $request->get('novocliente_email'),
              'telefone' => $request->get('novocliente_telefone'),
              'endereco' => $request->get('novocliente_endereco'),
              'numero' => $request->get('novocliente_numero'),
              'complemento' => $request->get('novocliente_complemento'),
              'bairro' => $request->get('novocliente_bairro'),
              'cidade' => $request->get('novocliente_cidade'),
              'uf' => $request->get('novocliente_estado'),
              'cep' => $request->get('novocliente_cep'),
              'created_at' => $carbon,
              'pais' => $request->get('novocliente_pais'),
              'status' => 'Ativo',
              'codigo' => $request->get('novocliente_codigo'),
            );
            DB::table('clientes')->insert($values);  

        //Insert na tabela log
        $values = array(
            'user_id' => Auth::user()->id, 
            'descricao' => "Criação de um novo cliente: " . $request->get('novocliente_nome'),
            'created_at' => $carbon);
            DB::table('log')->insert($values);  


        Alert::success('Novo cliente!', 'Cliente cadastrado com sucesso!');

        return redirect()->route('clientes.index');

    } 

    public function ViewCliente($id) {


        $clientes = Clientes::whereId($id)->first();

        return view('clientes.view');

    }

    public function OcultarCliente($id) {

        $carbon= Carbon::now();

        //Update na tabela Clientes 
        DB::table('clientes')
        ->where('id', $id)  
        ->limit(1) 
        ->update(array('status' => 'Desabilitado', 'updated_at' => $carbon));

        //Insert na tabela log
        $values = array(
            'user_id' => Auth::user()->id, 
            'descricao' => "Ação de ocultação do cliente: " . $request->get('novocliente_nome'),
            'created_at' => $carbon);
            DB::table('log')->insert($values);  

        Alert::success('Desabilitado!', 'Cliente desabilitado com sucesso!');

        return redirect()->route('clientes.index');

    }



}

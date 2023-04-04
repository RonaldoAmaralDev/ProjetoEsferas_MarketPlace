<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Produtos;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class ProdutosController extends Controller
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

        $produtos = Produtos::get();

        return view('produtos.index', compact('produtos'));
    }

    public function NovoProduto(Request $request) {


        $carbon= Carbon::now();
        $valor =  str_replace (',', '.', str_replace ('.', '', $request->get('novoproduto_valor')));


        //Insert na tabela produtos
        $values = array(
            'nome' => $request->get('novoproduto_nome'),
            'descricao' => $request->get('novoproduto_descricao'),
            'categoria' => $request->get('novoproduto_categoria'),
            'valor' => $valor,
            'desconto' => $request->get('novoproduto_desconto'),
            'status' => 'Ativo',
            'img' => 'https://demo.dashboardmarket.com/hexadash-html/ltr/img/digital-chair.png',
            'created_at' => $carbon);
            DB::table('produtos')->insert($values);  

        //Insert na tabela log
        $values = array(
            'user_id' => Auth::user()->id, 
            'descricao' => "Criação do produto: " . $request->get('novoproduto_nome'),
            'created_at' => $carbon);
            DB::table('log')->insert($values);  

        Alert::success('Novo produto!', 'Produto cadastrado com sucesso!');

        return redirect()->route('produtos.index');

    }


    public function ViewProduto(Request $request) {

        $produtos = Produtos::whereId($request->get('produto_id'))->first();

        return view('produtos.view', compact('produtos'));


    }

    public function OcultarProduto(Request $request) {

        $carbon= Carbon::now();
        $produto_id = $request->get('produto_id');


        //Desabilita o produto para não mostrar na tela de novos pedidos
        DB::table('produtos')
            ->where('id', $produto_id)  
            ->limit(1) 
            ->update(array('status' => 'Desabilitado', 'updated_at' => $carbon));

        Alert::success('Dados do produto!', 'Produto desabilitado com sucesso!');

        return redirect()->route('produtos.index');

    }



}

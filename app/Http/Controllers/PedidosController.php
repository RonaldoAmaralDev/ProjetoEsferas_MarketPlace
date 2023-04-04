<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedidos;
use App\Models\Clientes;
use App\Models\Produtos;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class PedidosController extends Controller
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
         $produtos = Produtos::whereStatus('Ativo')->get();
         $clientes = Clientes::get();

         $pedidos = DB::table('pedidos')
         ->select(
             'pedidos.id', 'produtos.nome as produto_descricao', 'clientes.nome as cliente_nome', 
             'pedidos.status', 'pedidos.created_at as data', 'pedidos.valor_total')  
         ->join('clientes', 'pedidos.cliente_id', 'clientes.id')
         ->join('produtos', 'pedidos.produto_id', 'produtos.id')
         ->orderBy('pedidos.id', 'asc')
         ->get();

        return view('pedidos.index', compact('produtos', 'clientes', 'pedidos'));
    }

    public function NovoPedido(Request $request) {
       
        $carbon= Carbon::now();


        //Pega o desconto do produto e calcula para o valor_unitario
         $produtos = Produtos::whereId($request->get('novopedido_produto'))->first();

         $desconto_produto = $produtos->desconto;
         $valor_unitario = $produtos->valor - ($produtos->valor / 100 * $desconto_produto);

         //Multiplica a quantidade informada x o valor_unitario já com o desconto
         $valor_total = $valor_unitario * $request->get('novopedido_quantidade');

         //Insert na tabela pedidos
         $values = array(
            'user_id' => Auth::user()->id,
            'produto_id' => $request->get('novopedido_produto'),
            'observacao' => $request->get('novopedido_descricao'),
            'quantidade' => $request->get('novopedido_quantidade'),
            'valor_unitario' => $valor_unitario,
            'valor_total' => $valor_total,
            'created_at' => $carbon,
            'status' => $request->get('novopedido_status'),
            'cliente_id' => $request->get('novopedido_cliente'));
            DB::table('pedidos')->insert($values);  

         //Insert na tabela log
         $values = array(
            'user_id' => Auth::user()->id, 
            'descricao' => "Criação de um novo pedido com ID: " . $request->get('novopedido_produto'),
            'created_at' => $carbon);
            DB::table('log')->insert($values);  


         Alert::success('Novo pedido!', 'Pedido cadastrado com sucesso!');

         return redirect()->route('pedidos.index');
        
    }

    public function ViewPedido($id) {

        $datas = DB::table('pedidos')
        ->select(
            'pedidos.id', 'produtos.nome as produto_descricao', 'clientes.nome as cliente_nome', 
            'pedidos.status', 'pedidos.created_at as data', 'pedidos.valor_unitario', 'pedidos.quantidade', 'pedidos.valor_total', 'produtos.desconto',
            'clientes.endereco as clientes_endereco', 'clientes.numero as clientes_numero', 'clientes.complemento as clientes_complemento', 'clientes.bairro as clientes_bairro',
            'clientes.cidade as clientes_cidade', 'clientes.uf as clientes_uf', 'clientes.cep as clientes_cep', 'clientes.pais as clientes_pais')  
        ->join('clientes', 'pedidos.cliente_id', 'clientes.id')
        ->join('produtos', 'pedidos.produto_id', 'produtos.id')
        ->where('pedidos.id', $id)
        ->first();

       return view('pedidos.view', compact('datas'));


    }

}

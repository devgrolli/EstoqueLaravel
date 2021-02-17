<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Http\Requests\PedidoRequest;

class PedidosController extends Controller{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $pedidos = Pedido::orderBy('produto')->paginate(10);
        else
            $pedidos = Pedido::where('produto', 'like', '%'.$filtragem.'%')
            ->orderBy("produto")
            ->paginate(5);
            // ->setpath('clientes?desc_filtro='+$filtragem); 
        return view('pedidos.index', ['pedidos'=>$pedidos]);
    }

    public function create(){
        return view('pedidos.create');
    }

    public function store(PedidoRequest $request){ // Responsável por gravar um novo registro 
        $novo_pedido = $request->all();
        Pedido::create($novo_pedido);
        return redirect()->route('pedidos')->with('success', "Pedido cadastrado com sucesso!");
    }

    public function destroy($id){
        try {
            Pedido::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        }catch(\Illuminate\Database\QueryException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }catch(\PDOException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret; 
    }

    public function edit(Request $request){
        $pedido = Pedido::find(\Crypt::decrypt($request->get('id')));
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(PedidoRequest $request, $id) {
        Pedido::find($id)->update($request->all());
        return redirect()->route('pedidos')->with('success', "Pedido alterador com sucesso!");
    }
}
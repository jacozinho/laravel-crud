<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Imovel;

class CidadeController extends Controller
{
    public function index(){
    	$registros = Cidade::all();
    	return view('admin.cidades.index',compact('registros'));
    }

    public function adicionar(){
    	return view('admin.cidades.adicionar');
    }

    public function salvar(Request $request){
    	// funciona...
    	// $dados = $request->all();
    	// $usuario = new User();
    	// $usuario->name = $dados['name'];
    	// $usuario->email = $dados['email'];
    	// $usuario->password = bcrypt($dados['password']);

    	// $usuario->save();

    	Cidade::create($request->all());

    	\Session::flash('mensagem',[
			'msg' => 'Registro de Cidade realizado com sucesso',
			'class' => 'green white-text'
		]);
    	return redirect()->route('admin.cidades');
    }

    public function editar($id){
    	$registro = Cidade::find($id);
    	return view('admin.cidades.editar',compact('registro'));
    }

    public function atualizar(Request $request, $id){
    	$registro = Cidade::find($id);
    	$dados = $request->all();


    	$registro->update($dados);

    	\Session::flash('mensagem',[
			'msg' => 'Registro atualizado com sucesso',
			'class' => 'green white-text'
		]);
    	return redirect()->route('admin.cidades');
    }

    public function deletar($id){
    	if(Imovel::where('cidade_id','=',$id)->count() > 0){
            $msg = "Não é possível remover esta cidade! Esses imóveis (";
            $imoveis = Imovel::where('cidade_id','=',$id)->get();
            foreach ($imoveis as $imovel) {
                $msg .= "| ".$imovel->titulo. " |";
            }
            $msg .= ") estão vinculados a esta cidade";

            \Session::flash('mensagem',[
            'msg' => $msg,
            'class' => 'red white-text'
            ]);
            return redirect()->route('admin.cidades');
        }

        Cidade::find($id)->delete();
    	\Session::flash('mensagem',[
			'msg' => 'Registro removido com sucesso',
			'class' => 'green white-text'
		]);
		return redirect()->route('admin.cidades');
    }
}

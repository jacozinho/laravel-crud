<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{
    public function index(){
    	$registros = Tipo::all();
    	return view('admin.tipos.index',compact('registros'));
    }

    public function adicionar(){
    	return view('admin.tipos.adicionar');
    }

    public function salvar(Request $request){
    	// funciona...
    	// $dados = $request->all();
    	// $usuario = new User();
    	// $usuario->name = $dados['name'];
    	// $usuario->email = $dados['email'];
    	// $usuario->password = bcrypt($dados['password']);

    	// $usuario->save();

    	Tipo::create($request->all());

    	\Session::flash('mensagem',[
			'msg' => 'Registro de Tipo realizado com sucesso',
			'class' => 'green white-text'
		]);
    	return redirect()->route('admin.tipos');
    }

    public function editar($id){
    	$registro = Tipo::find($id);
    	return view('admin.tipos.editar',compact('registro'));
    }

    public function atualizar(Request $request, $id){
    	$registro = Tipo::find($id);
    	$dados = $request->all();


    	$registro->update($dados);

    	\Session::flash('mensagem',[
			'msg' => 'Registro atualizado com sucesso',
			'class' => 'green white-text'
		]);
    	return redirect()->route('admin.tipos');
    }

    public function deletar($id){
    	if(Imovel::where('tipo_id','=',$id)->count() > 0){
            $msg = "Não é possível remover esse tipo de imóvel! Esses imóveis (";
            $imoveis = Imovel::where('tipo_id','=',$id)->get();
            foreach ($imoveis as $imovel) {
                $msg .= "| ".$imovel->titulo. " |";
            }
            $msg .= ") estão vinculados a esta cidade";

            \Session::flash('mensagem',[
            'msg' => $msg,
            'class' => 'red white-text'
            ]);
            return redirect()->route('admin.tipos');
        }

        Tipo::find($id)->delete();

    	\Session::flash('mensagem',[
			'msg' => 'Registro removido com sucesso',
			'class' => 'green white-text'
		]);
		return redirect()->route('admin.tipos');
    }
}

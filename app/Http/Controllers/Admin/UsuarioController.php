<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    public function index(){
        if(auth()->user()->can('usuario_listar')){
            $usuarios = User::all();
            return view('admin.usuarios.index',compact('usuarios'));
        } else{
            return redirect()->route('admin.principal');
        }
    	
    }

    public function login(Request $request){
    	$dados = $request->all();

    	if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
    		\Session::flash('mensagem',[
    			'msg' => 'Login realizado com sucesso',
    			'class' => 'green white-text'
    		]);
    		return redirect()->route('admin.principal');
    	}
    	\Session::flash('mensagem',[
    			'msg' => 'Erro no Login',
    			'class' => 'red white-text'
    		]);

    	return redirect()->route('admin.login');
    }

    public function sair(){
    	Auth::logout();
    	return redirect()->route('admin.login');
    }

    public function adicionar(){
        if(auth()->user()->can('usuario_adicionar')){
            return view('admin.usuarios.adicionar');
        } else{
            return redirect()->route('admin.principal');
        }    	
    }

    public function salvar(Request $request){
    	if(auth()->user()->can('usuario_adicionar')){
            // funciona...
            // $dados = $request->all();
            // $usuario = new User();
            // $usuario->name = $dados['name'];
            // $usuario->email = $dados['email'];
            // $usuario->password = bcrypt($dados['password']);

            // $usuario->save();

            
            User::create($request->all());

            \Session::flash('mensagem',[
                'msg' => 'Cadastro realizado com sucesso',
                'class' => 'green white-text'
            ]);
            return redirect()->route('admin.usuarios');
        } else{
            return redirect()->route('admin.principal');
        }

    }

    public function editar($id){
        if(auth()->user()->can('usuario_editar')){
            $usuario = User::find($id);
            return view('admin.usuarios.editar',compact('usuario'));
        } else{
            return redirect()->route('admin.principal');
        }
    	
    }

    public function atualizar(Request $request, $id){
    	if(auth()->user()->can('usuario_editar')){
            $usuario = User::find($id);
            $dados = $request->all();            
            if(isset($dados['password']) && strlen($dados['password']) > 5){
                $dados['password'] = bcrypt($dados['password']);
            } else{
                unset($dados['password']);
            }

            $usuario->update($dados);

            \Session::flash('mensagem',[
                'msg' => 'Cadastro atualizado com sucesso',
                'class' => 'green white-text'
            ]);
            return redirect()->route('admin.usuarios');
        } else{
            return redirect()->route('admin.principal');
        }

    }

    public function deletar($id){
    	if(auth()->user()->can('usuario_editar')){
            User::find($id)->delete();
            \Session::flash('mensagem',[
                'msg' => 'Cadastro removido com sucesso',
                'class' => 'green white-text'
            ]);
            return redirect()->route('admin.usuarios');
        } else{
            return redirect()->route('admin.principal');
        }
    }

    public function papel($id){
        if(auth()->user()->can('usuario_listar')){
            $usuario = User::find($id);
            $papel = Papel::all();

            return view('admin.usuarios.papel',compact('usuario','papel'));
        } else{
            return redirect()->route('admin.principal');
        }
        
    }

    public function salvarPapel(Request $request, $id){
        if(auth()->user()->can('usuario_adicionar')){            
            $usuario = User::find($id);
            $dados = $request->all();
            $papel = Papel::find($dados['papel_id']);
            $usuario->adicionaPapel($papel);

            return redirect()->back();
        } else{
            return redirect()->route('admin.principal');
        }
    }

    public function removerPapel($id, $papel_id){
        if(auth()->user()->can('usuario_adicionar')){
            $usuario = User::find($id);
            $papel = Papel::find($papel_id);
            $usuario->removePapel($papel);
            return redirect()->back();
        } else{
            return redirect()->route('admin.principal');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    public function index(){
        if(auth()->user()->can('papel_listar')){
        	$registros = Papel::all();
        	return view('admin.papel.index',compact('registros'));
        } else{
            return redirect()->route('admin.principal');
        } 
    }

    public function adicionar(){
    	if(auth()->user()->can('papel_adicionar')){
            return view('admin.papel.adicionar');
        } else{
            return redirect()->route('admin.principal');
        } 
    }

    public function salvar(Request $request){
    	if(auth()->user()->can('papel_adicionar')){
            Papel::create($request->all());
        	return redirect()->route('admin.papel');
        } else{
            return redirect()->route('admin.principal');
        } 
    }

    public function editar($id){
        if(auth()->user()->can('papel_editar')){
        	if(Papel::find($id)->nome == 'admin'){
        		return redirect()->route('admin.papel');
        	}

        	$registro = Papel::find($id);
        	return view('admin.papel.editar', compact('registro'));
        } else{
            return redirect()->route('admin.principal');
        } 
    }

    public function atualizar(Request $request, $id){
        if(auth()->user()->can('papel_editar')){
        	if(Papel::find($id)->nome == 'admin'){
        		return redirect()->route('admin.papel');
        	}
        	Papel::find($id)->update($request->all());
        	return redirect()->route('admin.papel');
        } else{
            return redirect()->route('admin.principal');
        } 
    }

    public function deletar($id){
    	if(auth()->user()->can('usuario_adicionar')){
            if(Papel::find($id)->nome == 'admin'){
        		return redirect()->route('admin.papel');
        	}
        	Papel::find($id)->delete();
        	return redirect()->route('admin.papel');
        } else{
            return redirect()->route('admin.principal');
        } 
        
    }

    public function permissao($id){
        if(auth()->user()->can('papel_listar')){
            $papel = Papel::find($id);
            $permissao = Permissao::all();

            return view('admin.papel.permissao',compact('papel','permissao'));
        } else{
            return redirect()->route('admin.principal');
        } 
        
    }

    public function adicionarPermissao(Request $request, $id){
        if(auth()->user()->can('papel_adicionar')){
            $papel = Papel::find($id);
            $permissao = Permissao::find($request['permissao_id']);

            $papel->adicionarPermissao($permissao);
            return redirect()->back();
        } else{
            return redirect()->route('admin.principal');
        } 
    }

    public function removerPermissao($id, $id_permissao){
        if(auth()->user()->can('papel_remover')){
            $papel = Papel::find($id);
            $permissao = Permissao::find($id_permissao);
            $papel->removerPermissao($permissao);
            return redirect()->back();
        } else{
            return redirect()->route('admin.principal');
        } 
    }
}








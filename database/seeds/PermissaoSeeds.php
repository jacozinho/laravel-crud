<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PERMISSÕES CRUD USUÁRIO
        if(!Permissao::where('nome','=','usuario_listar')->count()){
        	Permissao::create([
        		'nome'	=> 'usuario_listar',
        		'descricao'	=> 'Listar Usuários'
        	]);
        } else{
        	$permissao = Permissao::where('nome','=','usuario_listar')->first();
			$permissao->update([
        		'nome'	=> 'usuario_listar',
        		'descricao'	=> 'Listar Usuários'
        	]);
        }

        if(!Permissao::where('nome','=','usuario_adicionar')->count()){
        	Permissao::create([
        		'nome'	=> 'usuario_adicionar',
        		'descricao'	=> 'Adicionar Usuário'
        	]);
        } else{
        	$permissao = Permissao::where('nome','=','usuario_adicionar')->first();
			$permissao->update([
        		'nome'	=> 'usuario_adicionar',
        		'descricao'	=> 'Adicionar Usuário'
        	]);
        }

        if(!Permissao::where('nome','=','usuario_editar')->count()){
        	Permissao::create([
        		'nome'	=> 'usuario_editar',
        		'descricao'	=> 'Editar Usuário'
        	]);
        } else{
        	$permissao = Permissao::where('nome','=','usuario_editar')->first();
			$permissao->update([
        		'nome'	=> 'usuario_editar',
        		'descricao'	=> 'Editar Usuário'
        	]);
        }

        if(!Permissao::where('nome','=','usuario_remover')->count()){
            Permissao::create([
                'nome'  => 'usuario_remover',
                'descricao' => 'Remover Usuário'
            ]);
        } else{
            $permissao = Permissao::where('nome','=','usuario_remover')->first();
            $permissao->update([
                'nome'  => 'usuario_remover',
                'descricao' => 'Remover Usuário'
            ]);
        }

        // PERMISSÕES CRUD PAPEIS
        if(!Permissao::where('nome','=','papel_listar')->count()){
            Permissao::create([
                'nome'  => 'papel_listar',
                'descricao' => 'Listar Papel'
            ]);
        } else{
            $permissao = Permissao::where('nome','=','papel_listar')->first();
            $permissao->update([
                'nome'  => 'papel_listar',
                'descricao' => 'Listar Papel'
            ]);
        }

        if(!Permissao::where('nome','=','papel_adicionar')->count()){
            Permissao::create([
                'nome'  => 'papel_adicionar',
                'descricao' => 'Adicionar Papel'
            ]);
        } else{
            $permissao = Permissao::where('nome','=','papel_adicionar')->first();
            $permissao->update([
                'nome'  => 'papel_adicionar',
                'descricao' => 'Adicionar Papel'
            ]);
        }

        if(!Permissao::where('nome','=','papel_editar')->count()){
            Permissao::create([
                'nome'  => 'papel_editar',
                'descricao' => 'Editar Papel'
            ]);
        } else{
            $permissao = Permissao::where('nome','=','papel_editar')->first();
            $permissao->update([
                'nome'  => 'papel_editar',
                'descricao' => 'Editar Papel'
            ]);
        }

        if(!Permissao::where('nome','=','papel_remover')->count()){
            Permissao::create([
                'nome'  => 'papel_remover',
                'descricao' => 'Remover Papel'
            ]);
        } else{
            $permissao = Permissao::where('nome','=','papel_remover')->first();
            $permissao->update([
                'nome'  => 'papel_remover',
                'descricao' => 'Remover Papel'
            ]);
        }
    }
}

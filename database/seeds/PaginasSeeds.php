<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo','=','sobre')->count();
        if($existe){
        	$paginaSobre = Pagina::where('tipo','=','sobre')->first();

        } else{
        	$paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = 'Título da Empresa';
        $paginaSobre->descricao = 'Uma bola é sempre uma bola, pois é uma roda';
        $paginaSobre->texto = 'Texto sobre a empresa';
        $paginaSobre->imagem = 'img/modelo_img_home.jpg';
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.987976273373!2d-44.285281999999995!3d-2.510815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7f68e7df84bd4f3%3A0x32a2c32c47f4dabe!2zU8OjbyBMdcOtcyBTaG9wcGluZw!5e0!3m2!1spt-BR!2sbr!4v1488342898709" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $paginaSobre->tipo = 'sobre';
        $paginaSobre->save();

        echo 'Página Sobre criada com sucesso';


        $existe = Pagina::where('tipo','=','contato')->count();
        if($existe){
            $paginaSobre = Pagina::where('tipo','=','contato')->first();

        } else{
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = 'Entre em contato';
        $paginaSobre->descricao = 'Preencha o formulário';
        $paginaSobre->texto = 'Texto contato a empresa';
        $paginaSobre->email = 'fransconcfs@gmail.com';
        $paginaSobre->imagem = 'img/modelo_img_home.jpg';
        $paginaSobre->tipo = 'contato';
        $paginaSobre->save();

        echo 'Página Contato criada com sucesso';

    }
}

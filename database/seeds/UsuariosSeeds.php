<?php

use Illuminate\Database\Seeder;
// use App\User;

class UsuariosSeeds extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // $usuario = new User();
        // $usario->name = "Francisco da Conceição Silva";
        // $usuario->email = "fransconcfs@gmail.com";
        // $usuario->password = brcypt("fml121826");
        // $usuario->save();

        if(\App\User::where('email','=','marianacs@gmail.com')->count()){
            \App\User::where('email','=','marianacs@gmail.com')->first()->save(
                array(
                    'name' => 'Mariana da Cunha Silva',
                    'email' => 'fransconcfs@gmail.com',
                    'password' => bcrypt('fml121826')
                )
            );
            
            // $usario->name = "Francisco da Conceição Silva";
            // $usuario->email = "fransconcfs@gmail.com";
            // $usuario->password = brcypt("fml121826");
            // $usuario->save();

            // \App\User::update(array(
            //     'name' => 'Francisco da Conceição Silva',
            //     'email' => 'fransconcfs@gmail.com',
            //     'password' => bcrypt('fml121826')
            // ));
        } else{    
            // $usuario = new \App\User();
            // $usario->name = "Francisco da Conceição Silva";
            // $usuario->email = "fransconcfs@gmail.com";
            // $usuario->password = brcypt("fml121826");
            // $usuario->save();

            \App\User::create(array(
            	'name' => 'Mariana da Cunha Silva',
            	'email' => 'marianacs@gmail.com',
            	'password' => bcrypt('fml121826')
            ));
        }
    }
}

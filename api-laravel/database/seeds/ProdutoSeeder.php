<?php

use Illuminate\Database\Seeder;
 
class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produto')->insert([
            'nome' => 'Hamburguer de Carne',
            'preco' => '20',
             
        ]);

        DB::table('produto')->insert([
            'nome' => 'Hamburguer de Frango',
            'preco' => '19',
             
        ]);

        DB::table('produto')->insert([
            'nome' => 'Hamburguer de Queijo',
            'preco' => '15',
             
        ]);    
         
    }
}

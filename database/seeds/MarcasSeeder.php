<?php

use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('marcas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        DB::table('marcas')->insert([
            ['id'=>1,'nombre'=>'Samsung'],
            ['id'=>2,'nombre'=>'LG'],
            ['id'=>3,'nombre'=>'HP'],
            ['id'=>4,'nombre'=>'Polar'],
            ['id'=>5,'nombre'=>'Alpina'],
            ['id'=>6,'nombre'=>'Rexona'],
            ['id'=>7,'nombre'=>'Colgate'],
            ['id'=>8,'nombre'=>'Mazda'],
            ['id'=>9,'nombre'=>'TOTO'],
        ]);
    }
}
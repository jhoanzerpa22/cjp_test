<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('categorias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        DB::table('categorias')->insert([
            ['id'=>1,'nombre'=>'Tecnologia'],
            ['id'=>2,'nombre'=>'Alimentos'],
            ['id'=>3,'nombre'=>'Higiene'],
        ]);
    }
}
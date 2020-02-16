<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('productos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        DB::table('productos')->insert([
            ['id'=>1,'nombre'=>'A30','precio'=>150,'categoria_id'=>1,'marca_id'=>1],
            ['id'=>2,'nombre'=>'Compac Presario','precio'=>250,'categoria_id'=>1,'marca_id'=>3],
            ['id'=>3,'nombre'=>'Harina Pan','precio'=>1,'categoria_id'=>2,'marca_id'=>4],
            ['id'=>4,'nombre'=>'Yogurt Fresa','precio'=>0.3,'categoria_id'=>2,'marca_id'=>5],
            ['id'=>5,'nombre'=>'Desodorante','precio'=>2,'categoria_id'=>3,'marca_id'=>6],
            ['id'=>6,'nombre'=>'Mazda 3','precio'=>2000,'categoria_id'=>null,'marca_id'=>8],
            ['id'=>7,'nombre'=>'Bolso Escolar','precio'=>80,'categoria_id'=>null,'marca_id'=>9],
        ]);
    }
}
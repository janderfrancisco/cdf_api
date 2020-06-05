<?php

use Illuminate\Database\Seeder;
use App\Model\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /*
         para criar registro de teste manualmente
        Student::create([
            'name' => 'Jander',
            'email' => 'jander@teste.com',
            'status' => 1
        ]);
        */

        // utilizado para gerar 50 registros aleatórios no banco
        factory(Product::class, 50)->create();
    }
}

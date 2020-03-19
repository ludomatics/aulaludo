<?php

use Illuminate\Database\Seeder;

class CuestionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 3; $i++){
            $cuestionario = new \App\Models\Cuestionario();
            $cuestionario->tipo = 'sesion';
            $cuestionario->save();
            for ($j = 0; $j < 12; $j++){
                $pregunta = new \App\Models\Pregunta();
                $pregunta->pregunta = $faker->paragraph();
                $pregunta->save();
                $cuestionario->preguntas()->attach($pregunta);
                $randomNum = $faker -> numberBetween(1,4);
                for ($k = 0; $k < 4; $k++){
                    if ($randomNum == $k + 1){
                        $pregunta->opciones()->create([
                            'opcion' => $faker->sentence(),
                            'es_correcta' => true
                        ]);
                    }else{
                        $pregunta->opciones()->create([
                            'opcion' => $faker->sentence()
                        ]);
                    }
                }
            }
        }
    }
}

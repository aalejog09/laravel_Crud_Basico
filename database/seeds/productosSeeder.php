<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
class productosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= faker::create();
        for ($i=0; $i < 10; $i++) { 
           
            DB::table('productos')->insert(array(

                'nombre'=>$faker->randomElement(['camisa','pantalon','sueter','zapato','franela','sombrero']),
                'precio'=>$faker->numberBetween($min= 5, $max=100),
                'cantidad'=>$faker->numberBetween($min= 1, $max=20),
                'seccion'=>$faker->randomElement(['deporte','oficina','escolar','casual']),
                'categoria'=>$faker->randomElement(['Hombre','Mujer','Niño','Niña','Unisex']),
            ));
        }
    }
}

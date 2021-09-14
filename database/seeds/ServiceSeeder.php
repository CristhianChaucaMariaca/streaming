<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert(
            [
                [
                    'name'          =>  "Netflix",
                    'description'   =>  "Servicio de Streaming en formato de Video, con las mejores Series y peliculas para disfrutar con la familia.",
                    'price'         =>  90
                ],
                [
                    'name'          =>  "Amazon prime",
                    'description'   =>  "Streaming en formato de video con series y peliculas para disfrutar en familia.",
                    'price'         =>  "25"
                ],
                [
                    'name'          =>  "Disney Plus",
                    'description'   =>  "Las mejores peliculas de la franquicia de Disney para disfrutar con los pequeños de la familia.",
                    'price'         =>  41
                ],
                [
                    'name'          =>  "Star Plus",
                    'description'   =>  "Streaming con peliculas de warner.",
                    'price'         =>  71,
                ],
                [
                    'name'          =>  "Paramount",
                    'description'   => "Todas la peliculas de paramount",
                    'price'         => 40
                ],
                [
                    'name'          =>  "HBO Max",
                    'description'   =>  "El mejor contenido de HBO premium",
                    'price'         => 40
                ]
            ]

        );
    }
}

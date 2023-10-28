<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Aceite;
use App\Models\Cliente;
use App\Models\Compras;
use App\Models\DetalleCompra;
use Illuminate\Support\Arr;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'usuario']);
        Role::create(['name' => 'administrador']);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('soyadmin'),
            'role_id' => Role::where('name', 'administrador')->first()->id,
        ]);
        User::factory(5)->create();
        Aceite::factory(5)->create();
        Compras::factory(5)->create()->each(function ($compra) {
            $cantidadDetalles = rand(2, 5);
            $aceitesIds = Aceite::pluck('id_aceite')->toArray();
            $uniqueAceitesIds = array_unique($aceitesIds);
            $randomAceitesIds = Arr::random($uniqueAceitesIds, $cantidadDetalles);

            for ($i = 0; $i < $cantidadDetalles; $i++) {
                DetalleCompra::create([
                    'id_compra' => $compra->id_compra,
                    'id_aceite' => $randomAceitesIds[$i],
                    'cantidad' => rand(1, 10),
                ]);
            }
        });
    }
}
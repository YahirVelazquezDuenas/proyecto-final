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
            $aceites = Aceite::inRandomOrder()->limit(rand(2, 5))->get();

            $total = 0;

            foreach ($aceites as $aceite) {
                $cantidad = rand(1, 10);
                $precio = $aceite->precio;
                $total += $cantidad * $precio;

                DetalleCompra::create([
                    'id_compra' => $compra->id_compra,
                    'id_aceite' => $aceite->id_aceite,
                    'cantidad' => $cantidad,
                ]);
            }

            $compra->total = $total;
            $compra->save();
        });
    }

}
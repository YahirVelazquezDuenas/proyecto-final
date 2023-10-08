<?php

namespace App\Http\Controllers;
use App\Models\Aceite;
use App\Models\Cliente;
use App\Models\Compras;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
     public function index()
    {
        $numeroDeAceites = Aceite::count();
        $numeroDeClientes = Cliente::count();
        $numeroDeCompras = Compras::count();
        $fechaActual = Carbon::now()->toDateString();
        $comprasDelDia = Compras::whereDate('created_at', $fechaActual)->count();

        return view('dashboard', [
            'numeroDeAceites' => $numeroDeAceites,
            'numeroDeClientes' => $numeroDeClientes,
            'numeroDeCompras' => $numeroDeCompras,
            'comprasDelDia' => $comprasDelDia
        ]);
    }
}
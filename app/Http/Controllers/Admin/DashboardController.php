<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Muestra la vista principal del panel de administración.
     */
    public function index()
    {
        // En un proyecto real, aquí se verificaría el rol (admin),
        // pero por ahora, solo la autenticación es suficiente.
        return view('admin.dashboard'); 
    }
}

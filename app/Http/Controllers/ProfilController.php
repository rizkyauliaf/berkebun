<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index($id)
    {
        $data = User::find($id);
        return view('layoutpetugas.footer');
    }
}

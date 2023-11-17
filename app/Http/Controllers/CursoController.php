<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CursoController extends Controller
{



    public function index()
    {
        return view('admin.curso.index');
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}

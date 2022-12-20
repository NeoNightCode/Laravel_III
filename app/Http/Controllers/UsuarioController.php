<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function  index()
    {
        $usuarios = Usuario::whereNull('deleted_at')->get();
        return view("usuarios.index",compact("usuarios"));
    }
    
    public function  restaurar()
    {
        $usuario = new Usuario;
        $usuario->restoreAllDeletedUsers();

        
        return redirect("/usuarios");
    }

    public function borrado_d(Request $request)
    {
        Usuario::onlyTrashed()->forceDelete();
        return response()->json([
            'success' => 'Usuarios eliminados de forma definitiva.'
        ]);
    }


    public function borrar(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
    }
}

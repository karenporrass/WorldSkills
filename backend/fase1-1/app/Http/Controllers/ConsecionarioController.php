<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsecionarioController extends Controller
{
    public function post(Request $request){
        $post = new Post;
        $post->dueño = $request->json('dueño');
        $post->contacto = $request->json('contacto');
        $post->save();
}
}


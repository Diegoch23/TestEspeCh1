<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 

class QueryBuilderController extends Controller{
    public function pruebas($post){
    //$title='Test Post2';
    $posts=DB::select("SELECT title, body FROM posts WHERE id= ?", [$post]);
        dd($posts);
    }
}
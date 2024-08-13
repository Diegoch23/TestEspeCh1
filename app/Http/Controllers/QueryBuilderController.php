<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 

class QueryBuilderController extends Controller{
    public function pruebas($post){
    //$title='Test Post2';
    $posts=DB::select("SELECT title, body FROM posts WHERE id= ?", [$post]);
        dd($posts);
    }

    public function pruebaMaliciosa()
    {
        // Simular una entrada maliciosa
        $maliciousInput = "1 OR 1=1";
        $posts = DB::select("SELECT title, body FROM posts WHERE id= ?", [$maliciousInput]);

        // Verificar el comportamiento del sistema
        dd($posts); // Revisar si se comporta como se espera
    }

    public function pruebasInseguras($post)
    {
        // Inseguro: Concatenar la entrada directamente en la consulta SQL
        $query = "SELECT * FROM posts WHERE id = $post";

        // Ejecutar la consulta
        $posts = DB::select($query);

        // Mostrar los resultados
        dd($posts);
    }

       // Método seguro que previene inyecciones SQL
       public function pruebasSeguras($postId)
       {
           // Usar consultas parametrizadas para evitar inyecciones SQL
           $posts = DB::table('posts')
               ->select('title', 'body')
               ->where('id', '=', $postId)
               ->get();
   
           // Mostrar los resultados
           dd($posts);
       }
}
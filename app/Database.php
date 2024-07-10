<?php
namespace App;

class Database
{
    public function find(int $id): array
    {
        // Simulación de búsqueda en la base de datos
        return [
            'id' => $id,
            'name' => 'Diego Chancusig Simbaña',
            'email' => 'diegochancusisimbana@gmail.com'
        ];
    }
}

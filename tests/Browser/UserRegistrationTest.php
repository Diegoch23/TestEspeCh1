<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class UserRegistrationTest extends DuskTestCase
{
    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->pause(2000) // Pausar por 2 segundos para asegurar que la página se cargue completamente
                    ->screenshot('register-page-before') // Captura de pantalla antes de llenar el formulario
                    ->type('name', 'Usuario Prueba') // Llenar el campo de nombre
                    ->type('email', 'usuariotest@gmail.com') // Llenar el campo de email
                    ->type('password', 'usuariotest1313') // Llenar el campo de contraseña
                    ->type('password_confirmation', 'usuariotest1313') // Llenar el campo de confirmación de contraseña
                    ->screenshot('register-page-filled') // Captura de pantalla después de llenar el formulario
                    ->press('REGISTRARSE') // Presionar el botón de registro
                    ->pause(2000) // Pausa para esperar la redirección
                    ->screenshot('after-register'); // Captura de pantalla después de intentar registrarse

            // Verificar que el usuario fue registrado en la base de datos
            $this->assertDatabaseHas('users', [
                'email' => 'usuariotest@gmail.com',
                'name' => 'Usuario Prueba',
            ]);
        });
    }
}

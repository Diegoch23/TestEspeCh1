<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserLoginTest extends DuskTestCase
{
    public function testSuccessfulLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->pause(2000) // Pausar por 2 segundos para asegurar que la página se cargue completamente
                    ->screenshot('login-page-before-assert') // Tomar una captura de pantalla antes de verificar
                    ->assertPresent('input[name=email]') // Verificar que el campo de email está presente
                    ->screenshot('login-page-after-assert') // Tomar una captura de pantalla después de verificar
                    ->waitFor('input[name=email]', 10) // Esperar hasta 10 segundos para que el campo de email esté presente
                    ->type('input[name=email]', 'kenneth@gmail.com') // Usar el email del usuario ya registrado
                    ->waitFor('input[name=password]', 10) // Esperar hasta 10 segundos para que el campo de contraseña esté presente
                    ->type('input[name=password]', 'Kenneth1313') // Usar la contraseña del usuario ya registrado
                    ->screenshot('credentials-filled') // Captura de pantalla después de llenar las credenciales
                    ->press('INICIAR SESIÓN') // Presionar el botón de login
                    ->pause(2000) // Pausar para la redirección
                    ->screenshot('after-login') // Captura de pantalla después de intentar loguearse
                    ->assertPathIs('/dashboard'); // Verificar que la redirección fue a /dashboard
        });
    }
}


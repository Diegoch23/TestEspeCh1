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
                    ->assertSee('Email') // Verificar que el texto 'Email' está presente en la página
                    ->screenshot('login-page-after-assert') // Tomar una captura de pantalla después de verificar
                    ->waitFor('#email', 10) // Esperar hasta 10 segundos para que el campo de email esté presente
                    ->type('#email', 'newuser@exampl6.com') // Usar el email del usuario creado
                    ->waitFor('#password', 10) // Esperar hasta 10 segundos para que el campo de contraseña esté presente
                    ->type('#password', 'Password126') // Usar la contraseña del usuario creado
                    ->press('LOG IN')
                    ->waitForText('Dashboard', 10) // Esperar hasta 10 segundos para ver el texto 'Dashboard'
                    ->assertSee('Dashboard') // Verificar que el texto 'Dashboard' está presente
                    ->clickLink('Inicio') // Hacer clic en el enlace 'Inicio'
                    ->waitForLocation('/', 10) // Esperar hasta 10 segundos para la redirección
                    ->assertPathIs('/'); // Verificar que la redirección fue a /
        });
    }
}

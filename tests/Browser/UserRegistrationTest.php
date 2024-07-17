<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserRegistrationTest extends DuskTestCase
{
    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->pause(2000) // Pausar por 2 segundos para asegurar que la página se cargue completamente
                    ->type('name', 'New User5') // Llenar el campo de nombre
                    ->type('email', 'newuser@exampl5.com') // Llenar el campo de email
                    ->type('password', 'Password125') // Llenar el campo de contraseña
                    ->type('password_confirmation', 'Password125') // Llenar el campo de confirmación de contraseña
                    ->press('REGISTER') // Presionar el botón de registro
                    ->waitForLocation('/', 10) // Esperar hasta 10 segundos para la redirección
                    ->assertPathIs('/'); // Verificar que la redirección fue a /
        });
    }
}

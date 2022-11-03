<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class RegistroSesionCest
{
    public function REGISTROVAL1(AcceptanceTester $I)
    {
        $I->amOnPage('/Paginas/LogIn.php');
        $I->seeElement('.registrate');
    }

    // tests
    /* public function REGISTROINV1(AcceptanceTester $I)
    {
    } */
}

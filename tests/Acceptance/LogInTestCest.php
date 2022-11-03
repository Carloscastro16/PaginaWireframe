<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class LogInTestCest
{
    public function INICIOVal1(AcceptanceTester $I){
        $I->amOnPage('/Paginas/LogIn.php');
        $I->fillField('#logInGeneral #correo', 'odalover001016@gmail.com');
        $I->fillField('#logInGeneral #password', '');
        $I->click('Iniciar Sesion');
        $I->seeElement('.log-in');
    }
    
    public function INICIOVal2(AcceptanceTester $I){
        $I->amOnPage('/Paginas/LogIn.php');
        $I->fillField('#logInGeneral #correo', '');
        $I->fillField('#logInGeneral #password', 'Molecula12');
        $I->click('Iniciar Sesion');
        $I->seeInCurrentUrl('/Acciones/login.php');
        $I->seeInCurrentUrl('/Paginas/LogIn.php');
    }
    public function INICIOVal3(AcceptanceTester $I){
        $I->amOnPage('/Paginas/LogIn.php');
        $I->fillField('#logInGeneral #correo', 'odalover001016@gmail.com');
        $I->fillField('#logInGeneral #password', 'Molecula12');
        $I->click('Iniciar Sesion');
        $I->see('Perfil de Odalys');
    }
    public function INICIOVal4(AcceptanceTester $I){
        $I->amOnPage('/Paginas/LogIn.php');
        $I->fillField('#logInGeneral #correo', '');
        $I->fillField('#logInGeneral #password', '');
        $I->click('Iniciar Sesion');
        $I->seeElement('.log-in');
    }
    /* public function adminLink(AcceptanceTester $I){
        $I->amOnPage('/Paginas/DashboardAdmin.php');
        $I->click('#dropdown-menu');
        $I->see('Home');
        $I->click('#dropdown-menu .home');
        $I->see('Home');
    } */
    /* public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    } */
}

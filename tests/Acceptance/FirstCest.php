<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php');
        $I->see('Home');
    }
    public function linksWorks(AcceptanceTester $I){
        $I->amOnPage('/index.php');
        $I->click('Unete');
        $I->seeInCurrentUrl('/Paginas/LogIn.php');
        $I->seeElement('#correo');
    }
    
    /* public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    } */
}

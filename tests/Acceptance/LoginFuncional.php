<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function loginWorks(AcceptanceTester $I){
        $I->amOnPage('/Paginas/LogIn.php');
        $I->see('Log In');
    }
}

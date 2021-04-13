<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@email.com')
            ->setPassword('password')
            ->setPseudo('pseudo')
            ->setTel('telephone')
            ->setAdresse('adresse');
   
        $this->assertTrue($user->getEmail() === 'true@email.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getPseudo() === 'pseudo');
        $this->assertTrue($user->getTel() === 'telephone');
        $this->assertTrue($user->getAdresse() === 'adresse');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@email.com')
            ->setPassword('password')
            ->setPseudo('pseudo')
            ->setTel('telephone')
            ->setAdresse('adresse');
   
        $this->assertFalse($user->getEmail() === 'false@email.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getPseudo() === 'false');
        $this->assertFalse($user->getTel() === 'false');
        $this->assertFalse($user->getAdresse() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User();
   
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getPseudo());
        $this->assertEmpty($user->getTel());
        $this->assertEmpty($user->getAdresse());
    }
}

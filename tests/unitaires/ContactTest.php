<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testIsTrue()
    {
        $contact = new Contact();

        $contact->setEmail('email')
                ->setPseudo('pseudo')
                ->setContenu('contenu')
                ->setIsSend(true);
        
        $this->assertTrue($contact->getEmail() === 'email');
        $this->assertTrue($contact->getPseudo() === 'pseudo');
        $this->assertTrue($contact->getContenu() === 'contenu');
        $this->assertTrue(($contact->getIsSend() === true));
    }

    public function testIsFalse()
    {
        $contact = new Contact();

        $contact->setEmail('email')
                ->setPseudo('pseudo')
                ->setContenu('contenu')
                ->setIsSend(true);
   
        $this->assertFalse($contact->getEmail() === 'false');
        $this->assertFalse($contact->getPseudo() === 'false');
        $this->assertFalse($contact->getContenu() === 'false');
        $this->assertFalse($contact->getIsSend() === false);
    }

    public function testIsEmpty()
    {
        $contact = new Contact();
   
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getPseudo());
        $this->assertEmpty($contact->getContenu());
        $this->assertEmpty($contact->getIsSend());
        $this->assertEmpty($contact->getId());
    }
}

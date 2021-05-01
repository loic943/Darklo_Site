<?php

namespace App\Tests;

use App\Entity\Commentaire;
use App\Entity\News;
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
            ->setRoles([])
            ->setAvatar('avatar')
            ->setAdresse('adresse');
   
        $this->assertTrue($user->getEmail() === 'true@email.com');
        $this->assertTrue($user->getUsername() === 'true@email.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getPseudo() === 'pseudo');
        $this->assertTrue($user->getTel() === 'telephone');
        $this->assertTrue($user->getRoles() === ['ROLE_USER']);
        $this->assertTrue($user->getAvatar() === 'avatar');
        $this->assertTrue($user->getAdresse() === 'adresse');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@email.com')
            ->setPassword('password')
            ->setPseudo('pseudo')
            ->setTel('telephone')
            ->setRoles(['roles'])
            ->setAvatar('avatar')
            ->setAdresse('adresse');
   
        $this->assertFalse($user->getEmail() === 'false@email.com');
        $this->assertFalse($user->getUsername() === 'false@email.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getPseudo() === 'false');
        $this->assertFalse($user->getTel() === 'false');
        $this->assertFalse($user->getRoles() === ['false']);
        $this->assertFalse($user->getAvatar() === 'false');
        $this->assertFalse($user->getAdresse() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User();
   
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUsername());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getPseudo());
        $this->assertEmpty($user->getTel());
        $this->assertEmpty($user->getAdresse());
        $this->assertContains('ROLE_USER', $user->getRoles());
        $this->assertEmpty($user->getAvatar());
        $this->assertEmpty($user->getId());
        $this->assertEmpty($user->getSalt());
        $this->assertEmpty($user->eraseCredentials());
    }

    public function testAddGetRemoveCommentaire()
    {
        $user = new User();
        $commentaire = new Commentaire();

        $this->assertEmpty($user->getCommentaires());

        $user->addCommentaire($commentaire);
        $this->assertContains($commentaire, $user->getCommentaires());

        $user->removeCommentaire($commentaire);
        $this->assertEmpty($user->getCommentaires());
    }

    public function testAddGetRemoveNews()
    {
        $user = new User();
        $news = new News();

        $this->assertEmpty($user->getNews());

        $user->addNews($news);
        $this->assertContains($news, $user->getNews());

        $user->removeNews($news);
        $this->assertEmpty($user->getNews());
    }
}

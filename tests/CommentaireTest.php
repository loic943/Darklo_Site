<?php

namespace App\Tests;

use App\Entity\Commentaire;
use App\Entity\News;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentaireTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire = new Commentaire();
        $news = new News();
        $date = new DateTime();
        $user = new User();

        $commentaire->setTitre('titre')
            ->setContenu('contenu')
            ->setCreatedAt($date)
            ->setUser($user)
            ->setNews($news);
   
        $this->assertTrue($commentaire->getTitre() === 'titre');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getCreatedAt() === $date);
        $this->assertTrue($commentaire->getUser() === $user);
        $this->assertTrue($commentaire->getNews() === $news);

    }

    public function testIsFalse()
    {
        $commentaire = new Commentaire();
        $news = new News();
        $date = new DateTime();
        $user = new User();

        $commentaire->setTitre('titre')
            ->setContenu('contenu')
            ->setCreatedAt($date)
            ->setUser($user)
            ->setNews($news);
   
            $this->assertFalse($commentaire->getTitre() === 'false');
            $this->assertFalse($commentaire->getContenu() === 'false');
            $this->assertFalse($commentaire->getCreatedAt() === new DateTime());
            $this->assertFalse($commentaire->getUser() === new User());
            $this->assertFalse($commentaire->getNews() === new News());
    }

    public function testIsEmpty()
    {
        $commentaire = new Commentaire();
   
        $this->assertEmpty($commentaire->getTitre());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getUser());
        $this->assertEmpty($commentaire->getNews());
    }
}

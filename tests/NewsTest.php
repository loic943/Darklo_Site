<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\News;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    public function testIsTrue()
    {
        $news = new News();
        $date = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $news->setTitre('titre')
            ->setSlug('slug')
            ->setImage('image')
            ->setContenu('contenu')
            ->setCreatedAt($date)
            ->setPublie(true)
            ->setUser($user)
            ->addCategorie($categorie);
   
        $this->assertTrue($news->getTitre() === 'titre');
        $this->assertTrue($news->getSlug() === 'slug');
        $this->assertTrue($news->getImage() === 'image');
        $this->assertTrue($news->getContenu() === 'contenu');
        $this->assertTrue($news->getCreatedAt() === $date);
        $this->assertTrue($news->getPublie() === true);
        $this->assertTrue($news->getUser() === $user);
        $this->assertContains($categorie, $news->getCategorie());

    }

    public function testIsFalse()
    {
        $news = new News();
        $date = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $news->setTitre('titre')
            ->setSlug('slug')
            ->setImage('image')
            ->setContenu('contenu')
            ->setCreatedAt($date)
            ->setPublie(true)
            ->setUser($user)
            ->addCategorie($categorie);
   
            $this->assertFalse($news->getTitre() === 'false');
            $this->assertFalse($news->getSlug() === 'false');
            $this->assertFalse($news->getImage() === 'false');
            $this->assertFalse($news->getContenu() === 'false');
            $this->assertFalse($news->getCreatedAt() === new DateTime());
            $this->assertFalse($news->getPublie() === false);
            $this->assertFalse($news->getUser() === new User());
            $this->assertNotContains(new Categorie(), $news->getCategorie());
    }

    public function testIsEmpty()
    {
        $news = new News();
   
        $this->assertEmpty($news->getTitre());
        $this->assertEmpty($news->getSlug());
        $this->assertEmpty($news->getImage());
        $this->assertEmpty($news->getContenu());
        $this->assertEmpty($news->getCreatedAt());
        $this->assertEmpty($news->getPublie());
        $this->assertEmpty($news->getUser());
        $this->assertEmpty($news->getCategorie());
    }
}

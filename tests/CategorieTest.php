<?php

namespace App\Tests;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieTest extends TestCase
{
    public function testIsTrue()
    {
        $categorie = new Categorie();

        $categorie->setNom('nom')
                ->setSlug('slug')
                ->setDescription('description');
        
        $this->assertTrue($categorie->getNom() === 'nom');
        $this->assertTrue($categorie->getSlug() === 'slug');
        $this->assertTrue($categorie->getDescription() === 'description');
    }

    public function testIsFalse()
    {
        $categorie = new Categorie();

        $categorie->setNom('nom')
                ->setSlug('slug')
                ->setDescription('description');
   
        $this->assertFalse($categorie->getNom() === 'false');
        $this->assertFalse($categorie->getSlug() === 'false');
        $this->assertFalse($categorie->getDescription() === 'false');
    }

    public function testIsEmpty()
    {
        $categorie = new Categorie();
   
        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getSlug());
        $this->assertEmpty($categorie->getDescription());
    }
}

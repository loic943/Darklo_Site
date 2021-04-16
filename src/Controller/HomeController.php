<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CategorieRepository $categories, NewsRepository $news): Response
    {
        return $this->render('home/index.html.twig', [
            'categories' => $categories->recupAllCategories(),
            'posts' => $news->recupTroisNews(),
        ]);
    }
}

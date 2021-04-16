<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\NewsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        CategorieRepository $categories,
        NewsRepository $news,
        Request $requete,
        PaginatorInterface $paginator
    ): Response {
        $data = $news->findAll();

        $pagination = $paginator->paginate(
            $data,
            $requete->query->getInt('page', 1),
            3
        );

        return $this->render('home/index.html.twig', [
            'categories' => $categories->recupAllCategories(),
            'posts' => $pagination,
        ]);
    }
}

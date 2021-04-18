<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{slug}', name: 'categorie')]
    public function index(
        CategorieRepository $categorieRepository,
        Request $request,
        PaginatorInterface $paginatorInterface,
        string $slug
    ): Response {
        $categorie = $categorieRepository->findOneBy(['slug' => $slug]);
        $news = $categorie->getNews();

        $pagintation = $paginatorInterface->paginate(
            $news,
            $request->query->getInt('page', 1),
            1
        );

        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorie,
            'posts' => $pagintation,
        ]);
    }
}

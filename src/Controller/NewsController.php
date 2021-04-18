<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\CommentaireRepository;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news/{slug}/{id}', name: 'news')]
    public function index(
        NewsRepository $n,
        CommentaireRepository $com,
        string $slug,
        $id
    ): Response {
        return $this->render('news/post.html.twig', [
            'post' => $n->recupUneNews($slug),
            'commentaires' => $com->recupAllCommentaires($id),
        ]);
    }
}

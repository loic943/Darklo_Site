<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render("admin/dashboard.html.twig");
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Darklo');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categories', 'fas fa-clipboard-list', Categorie::class);
        yield MenuItem::linkToCrud('News', 'fas fa-edit', News::class);
    }
}

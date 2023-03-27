<?php

namespace App\Controller\Admin;

use App\Entity\Formule;
use App\Entity\Menu;
use App\Entity\Horaires;
use App\Entity\User;
use App\Entity\Plat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Formules', 'fas fa-list', Formule::class);
        yield MenuItem::linkToCrud('Menu', 'fas fa-list', Menu::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-list', Horaires::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-list', Plat::class);
    }
}

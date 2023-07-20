<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Garage;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Contact;
use App\Entity\Horaire;
use App\Entity\Service;
use App\Entity\Voiture;
use App\Entity\Temoignage;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
         return $this->render('admin\dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Garage', 'fa-sharp fa-solid fa-store', Garage::class);
        yield MenuItem::linkToCrud('Contact', 'fa-solid fa-car', Contact::class);
        yield MenuItem::linkToCrud('Horaire', 'fa-regular fa-clock', Horaire::class);
        yield MenuItem::linkToCrud('Marque', 'fa-sharp fa-solid fa-tag', Marque::class);
        yield MenuItem::linkToCrud('Modele', 'fa-sharp fa-solid fa-tag', Modele::class);
        yield MenuItem::linkToCrud('Service', 'fa-sharp fa-solid fa-wrench', Service::class);
        yield MenuItem::linkToCrud('Temoignage', 'fa-solid fa-star', Temoignage::class);
        // yield MenuItem::linkToCrud('Utilisateur', 'fa-solid fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Voiture', 'fa-solid fa-car', Voiture::class);
        /*yield MenuItem::linkToCrud('Admin', 'fa-solid fa-car', Admin::class);*/
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Products;
use App\Entity\Users;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    private CategoriesRepository $catRep;
    private ProductsRepository $artRep;
    public function __construct(ProductsRepository $artRep, CategoriesRepository $catRep  ){
        $this->catRep = $catRep;
        $this->artRep = $artRep;
    }
    
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

       
         return $this->render('admin/index.html.twig',['nbCat' => count($this->catRep->findAll()),'nbArt' =>count( $this->artRep->findAll())]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('E Commerce Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Categories', 'fas fa-box', Categories::class);
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', Users::class);
    }
}

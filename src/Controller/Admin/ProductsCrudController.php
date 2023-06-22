<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;


use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')
             ->setColumns('col-lg-3 col-sm-6'),
            IntegerField::new('stock')
             ->setColumns('col-lg-3 col-sm-6'),
            NumberField::new('price')
             ->setColumns('col-lg-3 col-sm-6'),
            AssociationField::new('categories')
             ->setColumns('col-lg-3 col-sm-6'),
             TextField::new('attachmentFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
             ImageField::new('attachment')->setBasePath('/uploads/attachments')->onlyOnIndex()
            ->setColumns('col-lg-3 col-sm-6'), 
            TextField::new('slug')
            ->setColumns('col-lg-3 col-sm-6'), 


        ];
    }
    
}

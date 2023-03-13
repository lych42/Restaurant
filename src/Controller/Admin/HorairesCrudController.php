<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class HorairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('jourSemaine'),
            DateTimeField::new('heureOuverture'),
            DateTimeField::new('heureFermeture'),
        ];
    }
}

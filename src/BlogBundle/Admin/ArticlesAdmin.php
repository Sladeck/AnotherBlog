<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticlesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title',       NULL, ['label' => "Titre"]);
        $formMapper->add('description', NULL, ['label' => "Description"]);
        $formMapper->add('author',      NULL, ['label' => "Auteur"]);
        $formMapper->add('dateOc',      NULL, ['label' => "Date de création"]);
        $formMapper->add('dateOm',      NULL, ['label' => "Date de modification"]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('dateOc');
        $datagridMapper->add('author');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->add('description');
        $listMapper->add('dateOc');
        $listMapper->add('dateOm');
    }
}

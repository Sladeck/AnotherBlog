<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('content',       NULL, ['label' => "Commentaire"]);
        $formMapper->add('author',        NULL, ['label' => "Auteur"]);
        $formMapper->add('articles',      NULL, ['label' => "Articles"]);
        $formMapper->add('dateOc',        NULL, ['label' => "Date de création"]);
        $formMapper->add('dateOm',        NULL, ['label' => "Date de modification"]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dateOc');
        $datagridMapper->add('dateOm');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('content',   NULL, ['label' => 'Contenu']);
        $listMapper->addIdentifier('author',    NULL, ['label' => 'Auteur']);
        $listMapper->addIdentifier('articles',  NULL, ['label' => 'Nom de l\'article']);
        $listMapper->addIdentifier('dateOc',    NULL, ['label' => 'Date de création']);
        $listMapper->addIdentifier('dateOm',    NULL, ['label' => 'Date de modification']);
    }
}

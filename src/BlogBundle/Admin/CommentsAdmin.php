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
        $listMapper->addIdentifier('content');
        $listMapper->addIdentifier('dateOc');
        $listMapper->addIdentifier('dateOm');
    }
}

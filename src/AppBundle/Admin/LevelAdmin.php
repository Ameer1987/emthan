<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class LevelAdmin extends AbstractAdmin
{
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('createdAt', 'datetime')
                ->add('createdBy', 'text')
                ->add('updatedAt', 'datetime')
                ->add('updatedBy', 'text')
                ->add('category', 'text')
                ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('createdAt')->add('createdBy')->add('updatedAt')->add('updatedBy')->add('category')        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('item')->addIdentifier('createdAt')->addIdentifier('createdBy')->addIdentifier('updatedAt')->addIdentifier('updatedBy')->addIdentifier('category')        ;
    }
    
    
    

}

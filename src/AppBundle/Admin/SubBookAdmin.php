<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class SubBookType extends AbstractAdmin
{
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('createdAt', 'datetime')
                ->add('updatedBy', 'text')
                ->add('createdBy', 'text')
                ->add('updatedAt', 'datetime')
                ->add('book'. 'text')
                ->add('subBookType', 'text')        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('createdAt')->add('updatedBy')->add('createdBy')->add('updatedAt')->add('book')->add('subBookType')        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('item')->addIdentifier('createdAt')->addIdentifier('updatedBy')->addIdentifier('createdBy')->addIdentifier('updatedAt')->addIdentifier('book')->addIdentifier('subBookType')        ;
    }
    

}

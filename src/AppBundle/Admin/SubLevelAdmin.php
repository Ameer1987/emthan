<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SubLevelAdmin extends AbstractAdmin
{
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('createdBy', 'text')
                ->add('createdAt', 'datetime')
                ->add('updatedBy', 'text')
                ->add('updatedAt', 'datetime')
                ->add('level', 'entity', array(
                    'class' => 'AppBundle\Entity\Level'
                ))
                ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('createdBy')->add('createdAt')->add('updatedBy')->add('updatedAt')->add('level');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('item')->addIdentifier('createdBy')->addIdentifier('createdAt')->addIdentifier('updatedBy')->addIdentifier('updatedAt')->addIdentifier('level');
    }
    
  

}

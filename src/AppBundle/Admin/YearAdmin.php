<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class YearAdmin extends AbstractAdmin
{
    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('createdBy', 'entity', array(
                    'class' => 'AppBundle\Entity\User',
                ))
                ->add('createdAt', 'datetime')
                ->add('updatedBy', 'entity', array(
                    'class' => 'AppBundle\Entity\User',
                ))
                ->add('updatedAt', 'sonata_type_date_picker')
                ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('createdBy')->add('createdAt')->add('updatedBy')
                ->add('updatedAt', 'doctrine_orm_datetime', array('field_type'=>'sonata_type_datetime_picker',))
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('item')->addIdentifier('createdBy')->addIdentifier('createdAt')->addIdentifier('updatedBy')->addIdentifier('updatedAt');
    }
    
}

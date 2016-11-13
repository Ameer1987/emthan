<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CoverAdmin extends AbstractAdmin
{
    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('colors', 'text')
                ->add('solofanMatly', 'checkbox')
                ->add('solofanLamea', 'checkbox')
                ->add('notes', 'textarea')
                ->add('responsibility', 'text')
                ->add('book', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('colors')->add('solofanMatly')->add('solofanLamea')->add('notes')->add('responsibility')->add('book')        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('colors')->addIdentifier('solofanMatly')->addIdentifier('solofanLamea')->addIdentifier('notes')->addIdentifier('responsibility')->addIdentifier('book')        ;
    }

}

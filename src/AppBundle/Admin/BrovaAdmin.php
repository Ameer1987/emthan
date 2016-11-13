<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class BrovaAdmin extends AbstractAdmin
{
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('receivedDate', 'datetime')
                ->add('sentDate', 'datetime')
                ->add('expectedDate', 'datetime')
                ->add('createdAt', 'datetime')
                ->add('updatedAt', 'datetime')
                ->add('updatedBy', 'text')
                ->add('createdBy', 'text')
                ->add('subBook')
                ->add('responsibility');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('receivedDate')->add('sentDate')->add('expectedDate')->add('createdAt')->add('updatedAt')->add('updatedBy')->add('createdBy')->add('subBook')->add('responsibility');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('item')->addIdentifier('receivedDate')->addIdentifier('sentDate')->addIdentifier('expectedDate')->addIdentifier('createdAt')->addIdentifier('updatedAt')->addIdentifier('updatedBy')->addIdentifier('createdBy')->addIdentifier('subBook')->addIdentifier('responsibility');
    }
    
 

}

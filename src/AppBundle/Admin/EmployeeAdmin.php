<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EmployeeAdmin extends AbstractAdmin
{
    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('name', 'text')
                ->add('employeeTypeId', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')->add('employeeTypeId');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')->addIdentifier('employeeTypeId');
    }
    
}

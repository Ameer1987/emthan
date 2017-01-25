<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('username')
                ->add('email')
                ->add('enabled')
//                ->add('password', 'password')
                ->add('roles')        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')->add('usernameCanonical')->add('email')->add('emailCanonical')->add('enabled')->add('salt')->add('password')->add('lastLogin')->add('confirmationToken')->add('passwordRequestedAt')->add('roles')        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username')->addIdentifier('usernameCanonical')->addIdentifier('email')->addIdentifier('emailCanonical')->addIdentifier('enabled')->addIdentifier('salt')->addIdentifier('password', 'password')->addIdentifier('lastLogin')->addIdentifier('confirmationToken')->addIdentifier('passwordRequestedAt')->addIdentifier('roles')        ;
    }
    
    
    
    

}

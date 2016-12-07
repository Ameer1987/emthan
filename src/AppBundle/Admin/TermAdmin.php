<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TermAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('item', 'text')
                ->add('createdBy', 'entity', array(
                    'class' => 'AppBundle\Entity\FosUser',
                ))
                ->add('createdAt', 'datetime')
                ->add('updatedBy', 'entity', array(
                    'class' => 'AppBundle\Entity\FosUser',
                ))
                ->add('updatedAt', 'datetime')
                ->add('year', 'entity', array(
                    'class' => 'AppBundle\Entity\Year',
                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('item')->add('createdBy')->add('createdAt')->add('updatedBy')->add('updatedAt')->add('year');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('item')->addIdentifier('createdBy')->addIdentifier('createdAt')->addIdentifier('updatedBy')->addIdentifier('updatedAt')->addIdentifier('year');
    }

}

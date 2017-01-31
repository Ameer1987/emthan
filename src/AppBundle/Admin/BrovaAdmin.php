<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BrovaAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('item', 'text')
                ->add('receivedDate', 'datetime')
                ->add('sentDate', 'datetime')
                ->add('expectedDate', 'datetime')
                ->add('BookContent', 'entity', array(
                    'class' => 'AppBundle\Entity\BookContent'
                ))
                ->add('responsibility', 'entity', array(
                    'class' => 'AppBundle\Entity\Employee'
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('item')->add('receivedDate')->add('sentDate')->add('expectedDate');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('item')->addIdentifier('receivedDate')->addIdentifier('sentDate')->addIdentifier('expectedDate')->addIdentifier('BookContent')->addIdentifier('responsibility');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Brova'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_brova';
    }

}

<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('item', 'text')
                ->add('subject', 'entity', array(
                    'class' => 'AppBundle\Entity\Subject',
                    'group_by' => function($val, $key, $index) {
                        return $val->getSubLevel()->getLevel()->getTerm()->getYear()
                                . ' - ' . $val->getSubLevel()->getLevel()->getTerm()
                                . ' - ' . $val->getSubLevel()->getLevel()
                                . ' - ' . $val->getSubLevel();
                    }
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('item')->add('subject');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('item')->addIdentifier('subject');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Category'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_category';
    }

}

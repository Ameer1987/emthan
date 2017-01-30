<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BookAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('item', 'text', array('label' => 'book'))
                ->add('book_code', 'text', array('label' => 'book_code'))
                ->add('price', 'text', array('label' => 'price'))
                ->add('color', 'text', array('label' => 'color'))
                ->add('pages', 'text', array('label' => 'pages'))
                ->add('sentToPrintDate', 'datetime', array('label' => 'sentToPrintDate'))
                ->add('finishPrintDate', 'datetime', array('label' => 'finishPrintDate'))
                ->add('responsibility', 'entity', array(
                    'class' => 'AppBundle\Entity\Employee'
                ))
                ->add('category', 'entity', array(
                    'class' => 'AppBundle\Entity\Category',
                    'group_by' => function($val, $key, $index) {
                        return $val->getSubject()->getSubLevel()->getLevel()->getTerm()->getYear()
                                . ' - ' . $val->getSubject()->getSubLevel()->getLevel()->getTerm()
                                . ' - ' . $val->getSubject()->getSubLevel()->getLevel()
                                . ' - ' . $val->getSubject()->getSubLevel()
                                . ' - ' . $val->getSubject();
                    }
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('item')->add('price')->add('color')->add('pages')->add('sentToPrintDate')->add('finishPrintDate')->add('responsibility')->add('category');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->add('item')->add('price')->add('color')->add('pages')->add('sentToPrintDate')->add('finishPrintDate')->add('responsibility')->add('category');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Book'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_book';
    }

}

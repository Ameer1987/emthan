<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;



class BookAdmin extends AbstractAdmin
{
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('price', 'text')
                ->add('color', 'text')
                ->add('pages', 'text')
                ->add('sentToPrintDate')
                ->add('finishPrintDate')
                ->add('bookType')
                ->add('responsibility')
                ->add('subject');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('price')->add('color')->add('pages')->add('sentToPrintDate')->add('finishPrintDate')->add('bookType')->add('responsibility')->add('subject')        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('item')->add('price')->add('color')->add('pages')->add('sentToPrintDate')->add('finishPrintDate')->add('bookType')->add('responsibility')->add('subject');
    }
    
    
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Book'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_book';
    }


}

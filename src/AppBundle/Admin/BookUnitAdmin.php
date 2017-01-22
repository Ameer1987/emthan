<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BookUnitAdmin extends AbstractAdmin
{
    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('item', 'text')
                ->add('book')
                ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('item')->add('book');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('item')->add('book');
    }
    
    
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BookUnit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_bookunit';
    }


}

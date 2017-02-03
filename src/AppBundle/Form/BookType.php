<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('item')->add('book_code')->add('price')->add('color')->add('pages')->add('sentToPrintDate', 'sonata_type_date_picker')->add('finishPrintDate', 'sonata_type_date_picker')->add('createdAt')->add('updatedAt')->add('category')->add('responsibility')->add('createdBy')->add('updatedBy');
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

<?php

namespace Exo\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InfoProType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siret', 'text')
            ->add('nomCom', 'text')
            ->add('adresse', 'text')
            ->add('codePostal', 'text')
            ->add('ville', 'text')
            ->add('pays', 'text')
            ->add('telephone', 'text')
            ->add('portable', 'text')
            ->add('mail', 'text')
            ->add('activite', 'text')
            ->add('site', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Exo\UserBundle\Entity\InfoPro'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exo_userbundle_infopro';
    }
}

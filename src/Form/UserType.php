<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id_user')
            ->add('lastname_user')
           ->add('firstname_user')
            ->add('password_user')
            ->add('password_user')
            ->add('role_user')
            ->add('email_user');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\User'
        ));
    }


    public function getName()
    {
        return 'user_form';
    }
}

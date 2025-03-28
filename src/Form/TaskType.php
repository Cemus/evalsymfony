<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'form'],
                'required' => true
            ])
            ->add('content', TextType::class, [
                'attr' => ['class' => 'form'],
                'required' => true
            ])
            ->add('createdAt', DateType::class, [
                'attr' => ['class' => 'form'],
                'widget' => 'single_text',
            ])
            ->add('expiredAt', DateType::class, [
                'attr' => ['class' => 'form'],
                'widget' => 'single_text',
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['value' => 'Ajouter la tâche']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Le titre',
                ],
            ])
            ->add('content', CKEditorType::class, [
                'label' => 'Contenu',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ->add('status', ChoiceType::class, [
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Brouillon' => 'brouillon',
                    'En Attente' => 'attente',
                    'Publier' => 'public',
                ],
            ])
            ->add('coverUrl', TextType::class, [
                'label' => 'Image Url',
                'attr' => [
                    'placeholder' => '/upload/...',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

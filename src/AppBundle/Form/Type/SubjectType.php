<?php

namespace AppBundle\Form\Type;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Subject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


/**
* @ORM\Entity()
* @ORM\Table()
*/

class SubjectType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
           ->add('title', TextType::class, ['label' => 'Titre'])
           ->add('description', TextType::class, ['label' => 'Description'])


       ;
   }


  public function configureOptions (OptionsResolver $resolver)
      {
          $resolver->setDefaults(
          [
            'data_class' => Subject::class,
            'method'  => 'POST'
          ]
        );
      }

    }

<?php

namespace AppBundle\Form\Type;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Reply;
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

class ReplyType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
           ->add('author', TextType::class, ['label' => 'Nom'])
           ->add('authorEmail', TextType::class, ['label' => 'Email'])
           ->add('comment', TextareaType::class, ['label' => 'Commentaire' ])


       ;
   }


  public function configureOptions (OptionsResolver $resolver)
      {
          $resolver->setDefaults(
          [
            'data_class' => Reply::class,
            'method'  => 'POST'
          ]
        );
      }

    }

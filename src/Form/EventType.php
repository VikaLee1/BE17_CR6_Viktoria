<?php 


namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["attr"=>["placeholder"=>"Please type the name of an event", "class"=>"form-control mb-2"]])
            ->add('description', TextareaType::class, ["attr"=>["placeholder"=>"Short description", "class"=>"form-control mb-2"]])
            ->add('picture', TextType::class, ["attr"=>["placeholder"=>"Please insert a link for an image", "class"=>"form-control mb-2"]])
            ->add('capacity', TextType::class, ["attr"=>["placeholder"=>"Please type the max number of people", "class"=>"form-control mb-2"]])
            ->add('email', TextType::class, ["attr"=>["placeholder"=>"Please type an email an event's organization", "class"=>"form-control mb-2"]])
            ->add('phone_number', TextType::class, ["attr"=>["placeholder"=>"Please type the number of an event's organization", "class"=>"form-control mb-2"]])
            ->add('city', TextType::class, ["attr"=>["placeholder"=>"Please type the city of an event", "class"=>"form-control mb-2"]])
            ->add('url', TextType::class, ["attr"=>["placeholder"=>"Please insert a link of an event", "class"=>"form-control mb-2"]])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'music' => "music",
                    'sport' => "sport",
                    'movie' => "movie",
                    'miscellaneous' => "miscellaneous"
                ]
                , "attr"=>["class"=>"form-control mb-2"]])
            ->add('date', DateTimeType::class, ["attr"=>[ "class"=>"form-control mb-2"]])
            ->add('Create', SubmitType::class, ["attr"=>["class"=>"btn btn-primary mb-2"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
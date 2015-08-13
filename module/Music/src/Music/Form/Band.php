<?php

namespace Music\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class Band extends Form
{
    public $em;

    public function __construct(EntityManager $em)
    {
        $this->em=$em;

        parent::__construct('band');

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new AuthorFilter());

        $this->add(array(
            'name' => 'id',
            'attibutes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome da Banda'
            ),
            'attributes' => array(
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Insira o nome da Banda'
            )
        ));

        $this->add(array(
            'name' => 'records',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Records',
                'object_manager' => $this->em,
                'target_class' => 'Music\Entity\Records',
                'property' => 'name'
            ),
            'attributes' => array(
                'required' => false,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success btn'
            )
        ));
    }
}
<?php

namespace Music\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element\Select;

class Music extends Form
{
    public $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;

        parent::__construct('music');

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
                'label' => 'Nome do Album'
            ),
            'attributes' => array(
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o nome do Album'
            )
        ));

        $this->add(array(
            'name' => 'duration',
            'options' => array(
                'type' => 'text',
                'label' => 'Duração'
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => ''
            )
        ));

        $this->add(array(
            'name' => 'album',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Album',
                'object_manager' => $this->em,
                'target_class' => 'Music\Entity\Album',
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
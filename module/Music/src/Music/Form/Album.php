<?php

namespace Music\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element\Select;

class Album extends Form
{
    public function __construct()
    {
        parent::__construct('album');

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
            'name' => 'year',
            'options' => array(
                'type' => 'text',
                'label' => 'Ano do Album'
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Entre com o Ano'
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
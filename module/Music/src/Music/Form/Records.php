<?php
/**
 * Created by PhpStorm.
 * User: Mateus
 * Date: 12/08/2015
 * Time: 20:21
 */

namespace Music\Form;

use Zend\Form\Form;

class Records extends Form
{
    public function __construct()
    {
        parent::__construct('records');

        $this->setAttribute('method','post');

        $this->add(array(
             'name'=>'id',
             'attribute'=>array(
                 'type' => 'hidden',
             )
        ));

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome da Gravadora'
            ),
            'attributes' => array(
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o nome da Gravadora'
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
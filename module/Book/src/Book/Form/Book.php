<?php

namespace Book\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element\Select;

class Book extends Form
{
    public $em;
    public $author;

    public function __construct(EntityManager $em, array $author = null, $name = null)
    {
        parent::__construct('book');

        $this->author = $author;
        $this->em = $em;

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new AuthorFilter());

        $this->add(array(
            'name' =>'id',
            'attibutes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome'
            ),
            'attributes' => array(
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o nome'
            )
        ));

        $this->add(array(
            'name' => 'isbn',
            'options' => array(
                'type' => 'text',
                'label' => 'ISBN'
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Entre com o ISBN'
            )
        ));

        $this->add(array(
            'name' => 'author',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Author',
                'object_manager' => $this->em,
                'target_class' => 'Book\Entity\Author',
                'property' => 'name'
            ),
            'attributes' => array(
                'required' => false,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'price',
            'options' => array(
                'type' => 'text',
                'label' => 'Preço'
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Entre com o preço'
            )
        ));

        /**
         * Tres formas de passar entidades que são foreign keys para um form
         * A minha preferida até o momento é a última, por ser necessário injetar um entity manager
         * e, usando o Helper do Doctrine, ficar mais fácil administrar dependencias no form
         * OBS: caso  não seja usado no form, deixar comentado pois isso quebra o form->isValid() mesmo
         * sendo o campo required sendo false.
         *
         */

/*        $categoria = new Select();
        $categoria->setLabel("Categoria")
            ->setName("category")
            ->setOptions(array('value_options' => $this->category)
            );
        $this->add($categoria);*/

/*        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'category',
            'options' => array(
                'value_options' => $this->category
            ),
            'attributes' => array(
                'class' => 'form-control',
                'style' => 'width:200px;'
            )
        ));*/

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
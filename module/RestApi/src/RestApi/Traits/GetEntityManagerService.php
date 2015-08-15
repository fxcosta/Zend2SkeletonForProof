<?php
namespace RestApi\Traits;

trait GetEntityManagerService
{
    public $em;

    /**
     * Apenas para brincar com traits, criei uma que me fornece sempre o entity manager
     * para usar nas minhas restful controllers e evitar criar mais uma abstração para
     * abstractrestfulcontroller
     * TODO Ver se essa é uma opção válida em questão de design
     *
     * @return mixed
     */
    protected function getEm()
    {
        if(null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        return $this->em;
    }
}
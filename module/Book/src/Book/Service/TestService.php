<?php
/**
 * Created by PhpStorm.
 * User: fx3costa
 * Date: 07/08/2015
 * Time: 18:55
 */

namespace Book\Service;

class TestService
{
    protected $valor = null;

    public function __construct($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }
}
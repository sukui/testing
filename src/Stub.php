<?php

namespace ZanPHP\Testing;


abstract class Stub
{
    protected $realClassName = null;

    /**
     * @return null
     */
    public function getRealClassName()
    {
        return $this->realClassName;
    }
}
<?php

namespace Presentation\Laravel\Component\Debug;

use Illuminate\Contracts\Support\Arrayable;
use Presentation\Framework\Component\Debug\SymfonyVarDump;

/**
 * Class VarDump.
 * The component displays custom data using Symfony VarDumper.
 * VarDump class overrides SymfonyVarDump to provide better output for Laravel.
 * It unpack's objects implementing Arrayable interface to hide not important data from dump.
 *
 * @package Presentation\Larave\Component\Debug
 */
class VarDump extends SymfonyVarDump
{

    public function setData($data)
    {
        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }
        return parent::setData($data);
    }
}

<?php

namespace Presentation\Laravel\Component\Debug;

use Illuminate\Contracts\Support\Arrayable;
use Presentation\Framework\Component\Debug\SymfonyVarDump;

/**
 * Class VarDump.
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

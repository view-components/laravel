<?php

namespace Nayjest\LaravelViewComponents\Components\Debug;

use Illuminate\Contracts\Support\Arrayable;
use Nayjest\ViewComponents\Components\Debug\SymfonyVarDump;

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

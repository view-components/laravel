<?php

namespace Nayjest\LaravelViewComponents\Components;

use Nayjest\LaravelViewComponents\Rendering\HasViewData;
use Nayjest\LaravelViewComponents\Rendering\TemplateViewTrait;
use Nayjest\ViewComponents\BaseComponents\ComponentInterface;
use Nayjest\ViewComponents\BaseComponents\ComponentTrait;
use Nayjest\ViewComponents\Rendering\HasTemplateInterface;

class TemplateView implements ComponentInterface, HasTemplateInterface
{
    use ComponentTrait;
    use TemplateViewTrait;
    use HasViewData;

    public function __construct($template, $vars = [])
    {
        $this->setTemplate($template);
        $this->setViewData($vars);
    }
}

<?php
namespace Nayjest\LaravelViewComponents\Components;

use Nayjest\LaravelViewComponents\Rendering\HasViewData;
use Nayjest\LaravelViewComponents\Rendering\TemplateViewTrait;
use Nayjest\ViewComponents\BaseComponents\ContainerInterface;
use Nayjest\ViewComponents\BaseComponents\ContainerTrait;
use Nayjest\ViewComponents\Rendering\HasTemplateInterface;

class TemplateContainer implements ContainerInterface, HasTemplateInterface
{
    use ContainerTrait;
    use TemplateViewTrait;
    use HasViewData;

    public function __construct(
        array $components = [],
        $template,
        $vars = []
    )
    {
        $this->setComponents($components);
        $this->setTemplate($template);
        $this->setViewData($vars);
    }
}

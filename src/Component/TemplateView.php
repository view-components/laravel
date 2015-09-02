<?php

namespace Presentation\Laravel\Component;

use Nayjest\Tree\NodeTrait;
use Presentation\Framework\Base\ComponentInterface;
use Presentation\Framework\Base\ComponentTrait;
use Presentation\Framework\Rendering\HasTemplateInterface;
use Presentation\Framework\Rendering\ViewTrait;
use Presentation\Laravel\Rendering\HasViewData;
use Presentation\Laravel\Rendering\TemplateViewTrait;

class TemplateView implements ComponentInterface, HasTemplateInterface
{
    use NodeTrait;
    use ViewTrait;
    use ComponentTrait;
    use TemplateViewTrait;
    use HasViewData;

    public function __construct($template = null, array $vars = [])
    {
        $this->setTemplate($template);
        $this->setViewData($vars);
    }
}

<?php

namespace Presentation\Laravel\Component;

use Presentation\Framework\Base\AbstractTemplateView;
use Presentation\Laravel\Rendering\Renderer;

class TemplateView extends AbstractTemplateView
{
    protected function getRenderer()
    {
        return Renderer::getInstance();
    }
}

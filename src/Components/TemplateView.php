<?php

namespace Nayjest\LaravelViewComponents\Components;

use Nayjest\LaravelViewComponents\Rendering\TemplateViewTrait;
use Nayjest\ViewComponents\BaseComponents\ComponentInterface;
use Nayjest\ViewComponents\BaseComponents\ComponentTrait;
use Nayjest\ViewComponents\Rendering\HasTemplateInterface;

class TemplateView implements ComponentInterface, HasTemplateInterface
{
    use ComponentTrait;
    use TemplateViewTrait;

    protected $viewData = [];

    /**
     * @return mixed
     */
    public function getViewData()
    {
        return $this->viewData;
    }

    /**
     * @param mixed $viewData
     */
    public function setViewData(array $viewData = [])
    {
        $this->viewData = $viewData;
    }
}

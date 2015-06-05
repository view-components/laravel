<?php

namespace Nayjest\LaravelViewComponents\Rendering;

use App;
use Nayjest\ViewComponents\Rendering\HasTemplateTrait;

/**
 * Trait TemplateViewTrait
 *
 */
trait TemplateViewTrait
{
    use HasTemplateTrait;

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    protected function getViewFactory()
    {
        return App::make('view');
    }

    abstract protected function getViewData();

    /**
     * Renders object.
     *
     * @return string
     */
    public function render()
    {
        return $this->getViewFactory()->make(
            $this->resolveTemplate(),
            $this->getViewData()
        )->render();
    }
}

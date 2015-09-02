<?php

namespace Presentation\Laravel\Rendering;

use App;
use Presentation\Framework\Rendering\HasTemplateTrait;


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
            array_merge(
                ['component' => $this],
                $this->getViewData()
            )
        )->render();
    }
}

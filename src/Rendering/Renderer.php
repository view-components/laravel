<?php

namespace Presentation\Laravel\Rendering;

use App;

class Renderer
{
    protected static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function render($template, array $viewData = null)
    {
        return $this->getViewFactory()->make(
            $template,
            $viewData
        )->render();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    protected function getViewFactory()
    {
        return App::make('view');
    }
}
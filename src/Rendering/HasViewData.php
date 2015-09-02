<?php

namespace Presentation\Laravel\Rendering;

trait HasViewData
{
    protected $viewData = [];

    /**
     * @return array
     */
    public function getViewData()
    {
        return $this->viewData;
    }

    /**
     * @param array $viewData
     * @return $this
     */
    public function setViewData(array $viewData = [])
    {
        $this->viewData = $viewData;
        return $this;
    }
}

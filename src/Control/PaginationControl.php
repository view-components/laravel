<?php

namespace Presentation\Laravel\Control;

use Presentation\Framework\Component\Text;
use Presentation\Framework\Control\PaginationControl as BasePaginationControl;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationControl extends BasePaginationControl
{
    protected function makeDefaultView()
    {
        return new Text(function(){
            $paginator = new LengthAwarePaginator(
                $this->dataProvider,
                $this->getTotalRecordsCount(),
                $this->recordsPerPage,
                (int)$this->pageInputOption->getValue(),
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath()
                ]
            );
            $paginator->setPageName($this->pageInputOption->getKey());
            return $paginator->render();
        });
    }
}

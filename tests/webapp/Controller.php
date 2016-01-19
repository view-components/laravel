<?php
namespace Presentation\Laravel\Demo;

use Presentation\Framework\Component\Debug\SymfonyVarDump;
use Presentation\Framework\Component\ManagedList\Control\FilterControl;
use Presentation\Framework\Component\ManagedList\Control\PaginationControl;
use Presentation\Framework\Component\ManagedList\ManagedList;
use Presentation\Framework\Input\InputOption;
use Presentation\Framework\Data\Operation\FilterOperation;
use Presentation\Framework\Rendering\SimpleRenderer;
use Presentation\Framework\Resource\AliasRegistry;
use Presentation\Framework\Resource\IncludedResourcesRegistry;
use Presentation\Framework\Resource\ResourceManager;
use Presentation\Grids\Column;
use Presentation\Grids\Control\ColumnSortingControl;
use Presentation\Grids\Control\ColumnSortingView;
use Presentation\Grids\Grid;
use Presentation\Laravel\Component\Debug\VarDump;
use Presentation\Laravel\Data\EloquentDataProvider;
use Presentation\Laravel\Demo\Model\User;
use Illuminate\Database\Capsule\Manager as DB;

class Controller extends AbstractController
{
    public $disableStandardCss = false;

    protected function getRenderer()
    {
        return new SimpleRenderer([
            __DIR__ . '/resources/views',
            dirname(dirname(__DIR__)) . '/vendor/presentation/grids/resources/views'
        ]);
    }

    protected function getResourceManager()
    {
        return new ResourceManager(
            new AliasRegistry([
                'jquery' => '//code.jquery.com/jquery-2.1.4.min.js'
            ]),
            new AliasRegistry(),
            new IncludedResourcesRegistry()
        );
    }

    protected function getDataProvider($operations = [], $useEloquent = true)
    {
        $qb = $useEloquent ? (new User())->newQuery() : DB::table('users');
        return new EloquentDataProvider($qb, $operations);
    }

    public function index()
    {
        $out = '';
        $out .= $this->renderMenu();
        $out .= '<h1>Presentation Framework \ Laravel Integration \ Test Application</h1><h2>Index Page</h2>';

        return $out;
    }

    public function demo1($useEloquentQueryBuilder = false, $useLaravelVarDump = false)
    {
        $provider = $this->getDataProvider([], true);
        $list = new ManagedList(
            $provider,
            $useLaravelVarDump? new VarDump() : new SymfonyVarDump(),
            [new PaginationControl(new InputOption('p', $_GET, 1), 5)]
        );
        return $this->page(
            $list->render(),
            'List '
            . ($useEloquentQueryBuilder?'+ EloquentQuery ':'+ DatabaseQuery ')
            . ($useLaravelVarDump ? '+ LaravelVarDump':'+ SymfonyVarDump'));
    }

    public function demo2()
    {
        return $this->demo1(false, true);
    }

    public function demo3()
    {
        return $this->demo1(true, false);
    }

    public function demo4()
    {
        return $this->demo1(true, true);
    }

    /**
     *
     *
     * @return string
     */
    public function demo5()
    {

        $grid = new Grid(
            $this->getDataProvider(),
            [
                //new Column('id'),
                new Column('name'),
                new Column('role'),
            ],
            [
                new FilterControl('name', FilterOperation::OPERATOR_EQ, new InputOption('name', $_GET)),
                new FilterControl('role', FilterOperation::OPERATOR_EQ, new InputOption('role', $_GET)),
                new PaginationControl(new InputOption('p', $_GET, 1), 5)

            ]
        );

        $grid->getColumns()->findByProperty('name', 'role', true)->getTitleCell()->addChild(new ColumnSortingControl(
            'role',
            new InputOption('sort', $_GET),
            new ColumnSortingView($this->getRenderer())
        ));
        return $this->page($grid->render(), 'Grid');
    }
}
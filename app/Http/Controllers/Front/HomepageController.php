<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Mesour\Bridges\Nette\Laravel\ApplicationManager;
use Mesour\UI\DataGrid;

class HomepageController extends Controller
{

    private $templateVars = [];

    public function __construct(ApplicationManager $applicationManager)
    {
        $app = $applicationManager->getApplication();

        //todo: move to component
        $grid = new DataGrid('test');

        $source = [
            [
                'id' => 1,
                'name' => 'John',
            ],[
                'id' => 2,
                'name' => 'Peter',
            ]
        ];

        $grid->setSource($source);

        $grid->getSource()->setPrimaryKey('id');

        $app->addComponent($grid);

        $this->templateVars['grid'] = $grid->create();

    }

    public function actionDefault()
    {
        return view('welcome', $this->templateVars);
    }

}

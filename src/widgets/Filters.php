<?php

namespace vladayson\GridView\widgets;

use yii\base\Widget;

/**
 * Class Filters
 * @package app\modules\gridView\widgets
 */
class Filters extends Widget
{
    /**
     * @var string
     */
    public $view;

    /**
     * @var array
     */
    public $params = [];

    /**
     * @return void
     */
    public function run(): void
    {
        parent::run();
        $this->renderWidget();
    }

    /**
     * @return void
     */
    public function renderWidget(): void
    {
        echo $this->render('filters/button', [
            'class' => 'btn btn-default',
            'formView' => $this->view,
            'formParams' => $this->params
        ]);
    }
}

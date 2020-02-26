<?php

namespace vladayson\GridView\widgets;

use kartik\grid\SerialColumn;
use yii\base\Widget;
use yii\grid\DataColumn;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;

/**
 * Class ColumnsChooser
 * @package app\modules\gridView\widgets
 */
class ColumnsChooser extends Widget
{
    /**
     * @var array
     */
    public $columns = [];

    /**
     * @var string
     */
    public $buttonClass = 'btn btn-default';

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var ActiveRecord
     */
    public $model;

    /**
     * @return void
     */
    public function run(): void
    {
        parent::run();
        $this->convertColumnsFormData();
        $this->renderWidget();
    }

    /**
     * @return void
     */
    public function renderWidget(): void
    {
        echo $this->render('column-chooser/button', ['columns' => $this->attributes, 'class' => $this->buttonClass]);
    }

    /**
     * return @void
     */
    private function convertColumnsFormData(): void
    {
        foreach ($this->columns as $column) {
            /** @var $column DataColumn */
            if (is_a($column, DataColumn::class)) {
                $label = (is_a($this->model, ActiveRecord::class) ? $this->model->getAttributeLabel
                    ($column->attribute) : $column->attribute);
                $this->attributes[] = [
                    'label' => $label,
                    'attribute' => $column->attribute
                ];
            }
        }
    }
}

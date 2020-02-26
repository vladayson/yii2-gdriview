<?php

namespace vladayson\GridView;

use vladayson\GridView\widgets\ColumnsChooser;
use vladayson\GridView\widgets\Filters;
use Exception;
use kartik\grid\GridView as BaseGridView;
use ReflectionClass;
use ReflectionException;
use webtoucher\cookie\AssetBundle;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\grid\DataColumn;
use yii\helpers\Json;
use yii\web\View;

/**
 * grid-view module definition class
 */
class GridView extends BaseGridView
{
    const COOKIE_NAME = 'all_attributes';

    /**
     * @var ActiveRecord|null
     */
    private $model;

    /**
     * @var string
     */
    private $modelName;

    /**
     * @var array
     */
    private $allColumns;

    /**
     * @var string
     */
    public $modelClass;

    /**
     * @var string
     */
    public $filterView;

    /**
     * @var array
     */
    public $filterViewParams;

    /**
     * @throws InvalidConfigException
     * @throws ReflectionException
     */
    public function init()
    {
        if (empty($this->modelClass)) {
            throw new InvalidArgumentException('$modelClass param should be passed');
        }
        $this->model = new $this->modelClass();
        $this->modelName = (new ReflectionClass($this->model))->getShortName();

        return parent::init();
    }

    /**
     * @return void
     */
    protected function initColumns()
    {
        parent::initColumns();
        $this->allColumns = $this->columns;
        $this->reInitColumns();
    }

    /**
     * return @void
     */
    public function reInitColumns(): void
    {
        if (isset($_COOKIE[self::COOKIE_NAME])) {
            $data = Json::decode($_COOKIE[self::COOKIE_NAME])[$this->modelName] ?? [];
            if (empty($data)) {
                return;
            }
            foreach ($this->columns as $i => $column) {
                /** @var $column DataColumn */
                if (!is_a($column, DataColumn::class)) {
                    continue;
                }
                if (!in_array($column->attribute, $data, false)) {
                    unset($this->columns[$i]);
                }
            }
        }
    }

    /**
     * return @void
     * @throws Exception
     */
    protected function registerAssets(): void
    {
        $view = $this->getView();
        GridViewAsset::register($view);
        AssetBundle::register($view);
        parent::registerAssets();

        $view->registerJs("var MODEL = '{$this->modelName}'; var COOKIE_NAME = '".self::COOKIE_NAME."'", View::POS_HEAD);
    }

    /**
     * @throws InvalidConfigException
     */
    protected function initPanel()
    {
        if (empty($this->panel)) {
            $this->panel = [
                'type' => GridView::TYPE_DEFAULT,
            ];
        }
        parent::initPanel();
    }

    /**
     * @return string
     * @throws Exception
     */
    protected function renderToolbar()
    {
        if (!is_array($this->toolbar)) {
            $this->toolbar = [];
        }
        $this->toolbar[] = [
            'content' => ColumnsChooser::widget([
                'columns' => $this->allColumns,
                'model' => $this->model
            ]),
        ];

        if ($this->filterView) {
            $this->toolbar[] = [
                'content' => Filters::widget(['view' => $this->filterView, 'params' => $this->filterViewParams]),
            ];
        }

        return parent::renderToolbar();
    }
}

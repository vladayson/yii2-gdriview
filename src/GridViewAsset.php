<?php

namespace vladayson\GridView;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Class GridViewAsset
 * @package vladayson\GridView
 */
class GridViewAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = __DIR__ . '/widgets/assets';

    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $js = [
        'js/column-chooser.js',
        'js/filter.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class
    ];
}

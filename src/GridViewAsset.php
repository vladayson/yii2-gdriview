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

    public $css = [
        'https://use.fontawesome.com/releases/v5.7.0/css/all.css'
    ];

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

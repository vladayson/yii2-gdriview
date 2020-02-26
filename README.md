Yii2 GridView
=============
Yii2 GridView with columns chooser and popups. It based on kartik GridView and uses its panel with export.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist gridview/yii2-gridview "*"
```

or add

```
"gridview/yii2-gridview": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \vladayson\GridView\GridView::widget([
        'dataProvider' => $dataProvider,
        'modelClass' => SomeSearchModel::class,
        'filterView' => '@app/views/search/_search', //search form path 
        'filterViewParams' => [
            'searchModel' => $searchModel,
            'someAnotherData' => $someAnother
        ],
        'columns' => [...], 
]); ?>```

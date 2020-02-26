<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;

echo Html::button(
    Html::tag('span', '', ['class' => 'glyphicon glyphicon-filter', 'id' => 'filter-btn']),
    ['class' => $class ?? 'btn btn-default']
);

Modal::begin([
    'header' => Yii::t('app', 'Filters'),
    'id' => 'filter-modal'
]);?>
<div id="filter-modal-content">
    <div class="container-fluid">
        <?=$this->render($formView, $formParams) ?>
    </div>
</div>
<?php Modal::end();?>

<?php
use yii\bootstrap4\Modal;
use yii\helpers\Html;

echo Html::button(
    'Фильтры',
    [
        'class' => $class ?? 'btn btn-danger',
        'id' => 'filter-btn'
    ]
);

Modal::begin([
    'title' => Yii::t('app', 'Filters'),
    'id' => 'filter-modal'
]);?>
<div id="filter-modal-content">
    <div class="container-fluid">
        <?=$this->render($formView, $formParams) ?>
    </div>
</div>
<?php Modal::end();?>

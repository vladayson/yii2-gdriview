<?php
use yii\bootstrap4\Modal;
use yii\helpers\Html;

echo Html::button(
    Html::tag('span', '', ['class' => 'fas fa-cogs', 'id' => 'columns-chooser-btn']),
    ['class' => $class ?? 'btn btn-default']
);

Modal::begin([
    'title' => Yii::t('app', 'Column Chooser'),
    'id' => 'column-chooser-modal'
]);?>
<div id="column-chooser-modal-content">
    <?=$this->render('_form', ['columns' => $columns])?>
</div>
<?php Modal::end();?>

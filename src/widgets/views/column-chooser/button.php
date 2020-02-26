<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;

echo Html::button(
    Html::tag('span', '', ['class' => 'glyphicon glyphicon-cog', 'id' => 'columns-chooser-btn']),
    ['class' => $class ?? 'btn btn-default']
);

Modal::begin([
    'header' => Yii::t('app', 'Column Chooser'),
    'id' => 'column-chooser-modal'
]);?>
<div id="column-chooser-modal-content">
    <?=$this->render('_form', ['columns' => $columns])?>
</div>
<?php Modal::end();?>

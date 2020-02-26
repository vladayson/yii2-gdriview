<?php

use yii\helpers\Html;
?>
<div class="container">
    <div class="form-group">
        <label>
            <?= Html::checkbox('choose-all', false, [
                'id' => 'js-chosen-attributes',
                'value' => ''
            ])?>
            All
        </label>
        <hr />
    </div>
    <?php foreach ($columns as $attribute): ?>
        <div class="form-group">
            <label>
            <?= Html::checkbox("choose-{$attribute['attribute']}", true, [
                'class' => 'js-chosen-attributes js-attr-' . $attribute['attribute'],
                'value' => $attribute['attribute']
            ])?>
                <?=$attribute['label']?>
            </label>
        </div>
    <?php endforeach; ?>

    <?php if ($columns): ?>
        <div class="form-group">
            <?=Html::button('Save', [
                'id' => 'save-chosen-buttons',
                'class' => 'btn btn-primary'
            ])?>
        </div>
    <?php endif;?>
</div>

<?php

use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Add</strong> Karma</div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li><a
                    href="<?php echo Url::toRoute('index'); ?>">Overview</a>
            </li>
            <li class="active">
                <a href="<?php echo Url::toRoute('add'); ?>">Add Karma Record</a>
            </li>
        </ul>
        <?php $form = \yii\widgets\ActiveForm::begin(); ?>
        <?php echo $hForm->render($form); ?>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>
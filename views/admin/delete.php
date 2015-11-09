<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('AdminModule.views_karma_delete', 'Delete karma: <strong>{name}</strong>', array('{name}' => $model->name)); ?></div>
    <div class="panel-body">


        <p>
            <?php echo Yii::t('AdminModule.views_user_delete', 'Are you sure you want to delete this Karma record? Deleting Karma records can cause some unexpected side effects.'); ?>
        </p>

        <?php
        echo \yii\widgets\DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'points',
                'description',
            ],
        ]);
        ?>

        <br/>
        <?php echo Html::a('Delete user', Url::toRoute(['/karma/admin/delete', 'id' => $model->id, 'doit' => 2]), array('class' => 'btn btn-danger', 'data-method' => 'POST')); ?>
        &nbsp;
        <?php echo Html::a('Back', Url::toRoute(['/karma/admin/edit', 'id' => $model->id]), array('class' => 'btn btn-primary')); ?>
        
    </div>
</div>
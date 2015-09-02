<div class="panel panel-default">
    <div class="panel-heading"><strong>Add</strong> Karma</div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li><a
                    href="<?php echo $this->createUrl('index'); ?>"><?php echo Yii::t('AdminModule.views_user_index', 'Overview'); ?></a>
            </li>
            <li class="active">
                <a href="<?php echo $this->createUrl('add'); ?>">Add Karma Record</a>
            </li>
        </ul>
        <p />
        <?php echo $form; ?>

    </div>
</div>
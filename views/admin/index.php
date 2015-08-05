<div class="panel panel-default">
    <div class="panel-heading"><strong>Manage</strong> karma</div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li class="active"><a
                    href="<?php echo $this->createUrl('index'); ?>">Overview</a>
            </li>
            <li>
                <a href="<?php echo $this->createUrl('add'); ?>">Add Karma Record</a>
            </li>
        </ul>
        <p />

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'user-grid',
            'dataProvider' => $model->resetScope()->search(),
            'itemsCssClass' => 'table table-hover',
            // 'loadingCssClass' => 'loader',
            'columns' => array(
                array(
                    'name' => 'name',
                    'header' => 'Name',
                ),
                array(
                    'name' => 'points',
                    'header' => 'Points',
                ),
                array(
                    'name' => 'description',
                    'header' => 'Description',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}{deleteOwn}',
                    'updateButtonUrl' => 'Yii::app()->createUrl("//karma/admin/edit", array("id"=>$data->id));',
                    'htmlOptions' => array('width' => '90px'),
                    'buttons' => array
                        (
                        'update' => array
                            (
                            'label' => '<i class="fa fa-pencil"></i>',
                            'imageUrl' => false,
                            'options' => array(
                                'style' => 'margin-right: 3px',
                                'class' => 'btn btn-primary btn-xs tt',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => '',
                                'data-original-title' => Yii::t('AdminModule.views_user_index', 'Edit user account'),
                            ),
                        ),
                        'deleteOwn' => array
                            (
                            'label' => '<i class="fa fa-times"></i>',
                            'imageUrl' => false,
                            'url' => 'Yii::app()->createUrl("//karma/admin/delete", array("id"=>$data->id));',
                            'deleteConfirmation' => false,
                            'options' => array(
                                'class' => 'btn btn-danger btn-xs tt',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => '',
                                'data-original-title' => Yii::t('AdminModule.views_user_index', 'Delete user account'),
                            ),
                        ),
                    ),
                ),
            ),
            'pager' => array(
                'class' => 'CLinkPager',
                'maxButtonCount' => 5,
                'nextPageLabel' => '<i class="fa fa-step-forward"></i>',
                'prevPageLabel' => '<i class="fa fa-step-backward"></i>',
                'firstPageLabel' => '<i class="fa fa-fast-backward"></i>',
                'lastPageLabel' => '<i class="fa fa-fast-forward"></i>',
                'header' => '',
                'htmlOptions' => array('class' => 'pagination'),
            ),
            'pagerCssClass' => 'pagination-container',
        ));
        ?>

    </div>
</div>
<div class="panel panel-default">
    <div
        class="panel-heading"><?php echo Yii::t('UserModule.views_profile_about', '<strong>Karma</strong> for this user'); ?></div>

    <div class="panel-body">

        <?php
        // 'modelx' => KarmaUser::model()->
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'user-grid',
            'dataProvider' => $model->user($user->id)->search(), 
            'itemsCssClass' => 'table table-hover',
            // 'loadingCssClass' => 'loader',
            'columns' => array(
                array(
                    'name' => 'karma.points',
                    'header' => 'Points',
                ),
                array(
                    'name' => 'karma.name',
                    'header' => 'Karma',
                ),
                array(
                    'name' => 'karma.description',
                    'header' => 'Description',
                ),
                array(
                    'name' => 'created_at',
                    'value' => 'date("M j, Y", strtotime($data->created_at))',
                    'header' => '',
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

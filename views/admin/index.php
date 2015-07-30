<div class="panel panel-default">

    <div class="panel-heading"><?php echo Yii::t('KarmaModule.base', 'Manage <strong>karma</strong>'); ?></div>
    
    <div class="panel-body">

        <p>
            <?php echo Yii::t('KarmaModule.views_admin_index', 'Here you can manage reported users posts.'); ?>
        </p>
        
        <?php $this->widget('application.modules.karma.widgets.KarmaAdminGrid', array('reportedContent' => $reportedContent))?>

    </div>
</div>
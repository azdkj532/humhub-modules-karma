<?php

Yii::app()->moduleManager->register(array(
    'id' => 'karma',
    'class' => 'application.modules.karma.KarmaModule',
    'import' => array(
        'application.modules.karma.*',
        'application.modules.karma.models.*',
        'application.modules.karma.widgets.*',
    ),
    'events' => array(
        array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('KarmaEvents', 'onAdminMenuInit')),		
		// array('class' => 'WallEntryControlsWidget', 'event' => 'onInit', 'callback' => array('ReportContentModule', 'onWallEntryControlsInit')),
		// array('class' => 'HActiveRecordContent', 'event' => 'onBeforeDelete', 'callback' => array('ReportContentModule', 'onContentDelete')),
		// array('class' => 'SpaceAdminMenuWidget', 'event' => 'onInit', 'callback' => array('ReportContentModule', 'onSpaceAdminMenuInit')),
        array('class' => 'TopMenuWidget', 'event' => 'onInit', 'callback' => array('KarmaEvents', 'onTopMenuInit')),
    ),
));
?>
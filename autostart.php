<?php

Yii::app()->moduleManager->register(array(
    'id' => 'karma',
    'class' => 'application.modules.karma.KarmaModule',
    'import' => array(
        'application.modules.karma.*',
    ),
    'events' => array(
        array('class' => 'TopMenuWidget', 'event' => 'onInit', 'callback' => array('KarmaEvents', 'onTopMenuInit')),
    ),
));
?>
<?php

class KarmaEvents{
    public static function onTopMenuInit($event){
        $event->sender->addItem(array(
            'label' => 'Karma',
            'url' => Yii::app()->createUrl('/karma/main/index', array()),
            'icon' => '<i class="fa fa-sun-o"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'karma'),
        ));
    }
}
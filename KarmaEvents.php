<?php

class KarmaEvents{
    
    public static function onTopMenuInit($event){
        $event->sender->addItem(array(
            'label' => 'Karma',
            'url' => Yii::app()->createUrl('/karma/main/index', array()),
            'icon' => '<i class="fa fa-trophy"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'karma'),
        ));
    }

    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param type $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => Yii::t('KarmaModule.base', 'Karma'),
            'url' => Yii::app()->createUrl('//karma/admin'),
            'group' => 'manage',
            'icon' => '<i class="fa fa-trophy"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'karma' && Yii::app()->controller->id == 'admin'),
            'sortOrder' => 510,
        ));
    }


    /** 
     * Add the Karma menu to the user
     * profile page
     * @param type $event
     */
    public static function onProfileMenuWidgetInit($event) 
    {
         $event->sender->addItem(array(
            'label' => Yii::t('KarmaModule.base', 'Karma'),
            'group' => 'profile',
            'url' => $event->sender->user->createUrl('//karma/profile/view'),
            'sortOrder' => 400,
            'isActive' => (Yii::app()->controller->module->id == "karma" && Yii::app()->controller->id == "profile" && Yii::app()->controller->action->id == "view"),
        ));
    }

}
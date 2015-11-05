<?php

use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\ProfileMenu;

return [
    'id' => 'karma',
    'class' => 'humhub\modules\karma\Module',
    'namespace' => 'humhub\modules\karma',
    'events' => [

		['class' => AdminMenu::className(), 'event' => AdminMenu::EVENT_INIT, 'callback' => ['humhub\modules\karma\Events', 'onAdminMenuInit']],
		['class' => ProfileMenu::className(), 'event' => ProfileMenu::EVENT_INIT, 'callback' => ['humhub\modules\karma\Events', 'onProfileMenuWidgetInit']],
        
        // ['class' => User::className(), 'event' => User::EVENT_BEFORE_DELETE, 'callback' => ['humhub\modules\mail\Events', 'onUserDelete']],
        // ['class' => TopMenu::className(), 'event' => TopMenu::EVENT_INIT, 'callback' => ['humhub\modules\mail\Events', 'onTopMenuInit']],
        // ['class' => NotificationArea::className(), 'event' => NotificationArea::EVENT_INIT, 'callback' => ['humhub\modules\mail\Events', 'onNotificationAddonInit']],
        // ['class' => ProfileHeaderControls::className(), 'event' => ProfileHeaderControls::EVENT_INIT, 'callback' => ['humhub\modules\mail\Events', 'onProfileHeaderControlsInit']],
    ],
];
?>
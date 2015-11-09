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
    ],
];
?>
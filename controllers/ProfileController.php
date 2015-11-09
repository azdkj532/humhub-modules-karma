<?php


namespace humhub\modules\karma\controllers;

use humhub\modules\karma\models\KarmaUserSearch;
use Yii;
use yii\helpers\Url;
use humhub\modules\user\models\User;
use humhub\modules\karma\models\Karma;
use humhub\modules\karma\models\KarmaSearch;
use humhub\modules\karma\models\KarmaUser;
use humhub\compat\HForm;
use humhub\modules\content\components\ContentContainerController;


class ProfileController extends \humhub\modules\content\components\ContentContainerController
{

    /**
     *
     */
    public function actionView()
    {
        $searchModel = new KarmaUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        // $model->findByAttributes(array('user_id' => $this->getUser()->id));
        return $this->render('karma', array(
            'user' => $this->getUser(),
            'dataProvider' => $dataProvider,
        ));
    }

	
}

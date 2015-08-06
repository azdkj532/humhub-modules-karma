<?php 

class ProfileController extends Controller {


    public $subLayout = "application.modules_core.user.views.profile._layout";
    public $user = null;


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@', (HSetting::Get('allowGuestAccess', 'authentication_internal')) ? "?" : "@"),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }


    /**
     *
     */
    public function actionView()
    {
        // $model->findByAttributes(array('user_id' => $this->getUser()->id));
        $this->render('karma', array(
            'user' => $this->getUser(), 
            // 'modelx' => new KarmaUser('search'),
            'model' => new KarmaUser('search')
        ));
    }




    public function getUser()
    {

        if ($this->user != null) {
            return $this->user;
        }

        // Get User GUID by parameter
        $guid = Yii::app()->request->getQuery('uguid');
        if ($guid == "") {
            // Workaround for older version
            $guid = Yii::app()->request->getQuery('guid');
        }

        $this->user = User::model()->findByAttributes(array('guid' => $guid));

        if ($this->user == null)
            throw new CHttpException(404, Yii::t('UserModule.behaviors_ProfileControllerBehavior', 'User not found!'));


        return $this->user;
    }

	
}

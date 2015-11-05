<?php

namespace humhub\modules\karma\controllers;

use Yii;
use yii\helpers\Url;
use humhub\modules\karma\models\Karma;
use humhub\modules\karma\models\KarmaSearch;

class AdminController extends \humhub\modules\admin\components\Controller
{

    public $subLayout = "@humhub/modules/admin/views/_layout";

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => \humhub\components\behaviors\AccessControl::className(),
            ]
        ];
    }

    /**
     * Configuration Action for Super Admins
     */
    public function actionIndex() 
    {

        $searchModel = new KarmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', array(
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => Karma::find()
        ));
        
    }
     


    /** 
     * Add a karma record
     */
    public function actionAdd()
    {

        // Build Form Definition
        $definition = array();
        $definition['elements'] = array();

        // Define Form Eleements
        $definition['elements']['Karma'] = array(
            'type' => 'form',
            'title' => 'Karma',
            'elements' => array(
                'name' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'maxlength' => 25,
                ),
                'points' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'maxlength' => 10,
                ),
                'description' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'maxlength' => 1000
                ),
            ),
        );

        // Get Form Definition
        $definition['buttons'] = array(
            'save' => array(
                'type' => 'submit',
                'class' => 'btn btn-primary',
                'label' => 'Create'
            ),
        );

        $form = new HForm($definition);
        $form['Karma']->model = Karma::model();

        // Save new karma
        if($form->submitted('save') && $form->validate()) {
            
            $karmaModel = new Karma;
            $karmaModel->name = $form['Karma']->model->name;
            $karmaModel->points = $form['Karma']->model->points;
            $karmaModel->description = $form['Karma']->model->description;
            $karmaModel->save();

            $this->redirect($this->createUrl('index'));

        }


        $this->render('add', array('form' => $form));
    }


    /** 
     * Edit a karma record
     */
    public function actionEdit()
    {

        $_POST = Yii::app()->input->stripClean($_POST);

        $id = (int) Yii::app()->request->getQuery('id');
        $user = User::model()->resetScope()->findByPk($id);
        $karma = Karma::model()->resetScope()->findByPk($id);

        if ($karma == null)
            throw new CHttpException(404, "Karma record not found!");

        // Build Form Definition
        $definition = array();
        $definition['elements'] = array();

        $groupModels = Group::model()->findAll(array('order' => 'name'));

        // Define Form Eleements
        $definition['elements']['Karma'] = array(
            'type' => 'form',
            'title' => 'Karma',
            'elements' => array(
                'name' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'maxlength' => 25,
                ),
                'points' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'maxlength' => 10,
                ),
                'description' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'maxlength' => 1000
                ),
            ),
        );


        // Get Form Definition
        $definition['buttons'] = array(
            'save' => array(
                'type' => 'submit',
                'label' => 'Save',
                'class' => 'btn btn-primary',
            ),
            'delete' => array(
                'type' => 'submit',
                'label' => 'Delete',
                'class' => 'btn btn-danger',
            ),
        );

        $form = new HForm($definition);
        $form['Karma']->model = $karma;

        if ($form->submitted('save') && $form->validate()) {
            $this->forcePostRequest();

            if($form['Karma']->model->save()) {
                $this->redirect($this->createUrl('edit', array('id' => $karma->id)));
                return;
            }
        }

        if ($form->submitted('delete')) {
            $this->redirect(Yii::app()->createUrl('karma/admin/delete', array('id' => $user->id)));
        }

        $this->render('edit', array('form' => $form));

    }


    /**
     * Deletes a karma record
     */
    public function actionDelete()
    {

        $id = (int) Yii::app()->request->getQuery('id');
        $doit = (int) Yii::app()->request->getQuery('doit');

        $karma = Karma::model()->resetScope()->findByPk($id);

        if ($karma == null) {
            throw new CHttpException(404, "Karma record not found");
        } 

        if ($doit == 2) {

            $this->forcePostRequest();

            $karma->delete();
            $this->redirect($this->createUrl('index'));

        }

        $this->render('delete', array('model' => $karma));
    }
}
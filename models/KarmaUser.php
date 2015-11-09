<?php

namespace humhub\modules\karma\models;

use humhub\modules\user\models\User;
use humhub\modules\karma\models\Karma;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use humhub\components\ActiveRecord;



/**
 * This is the model class for table "karma_user".
 *
 * The followings are the available columns in table 'karma_user':
 * @property integer $id
 * @property integer $user_id
 * @property integer $karma_id
 * @property string $created_at
 * @property string $updated_at
 */
class KarmaUser extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public static function tableName()
	{
		return 'karma_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array(['user_id', 'karma_id'], 'required'),
			array(['user_id', 'karma_id'], 'integer'),
			array(['created_at', 'updated_at'], 'safe'),
		);
	}


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getKarma()
    {
        return $this->hasOne(Karma::className(), ['id' => 'karma_id']);
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'karma_id' => 'Karma',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}


	/** 
	 * Filters results by the question_id
	 * @param $question_id
	 */
	public function user($user_id)
	{
	    $this->getDbCriteria()->mergeWith(array(
	        'condition'=>"user_id=:user_id", 
	        'params' => array(':user_id' => $user_id)
	    ));

	    return $this;
	}

	/**
	 * Calculate the user's karma score
	 */
	public function score($user_id) {

		// Calculate the "score" (up votes minus down votes)
		$sql = "SELECT sum(points) as score FROM karma_user ku, karma k
					WHERE k.id = ku.karma_id
					AND user_id = :user_id";
					
		return Yii::app()->db->createCommand($sql)->bindValue('user_id', $user_id)->queryScalar();

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KarmaUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/** 
	 * Attaches karam to a user
	 * @param int $user_id
	 * @param int $karma_id
	 */
	public function attachKarma($user_id, $karma_id) 
	{
		$karma = new KarmaUser;
		$karma->user_id = $user_id;
		$karma->karma_id = $karma_id;

		if($karma->validate()) {
			$karma->save();
			return true;
		} else {
			return false;
		}

	} 
}

<?php

namespace humhub\modules\karma\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use humhub\modules\karma\models\Karma;
use humhub\modules\karma\models\KarmaUser;

class KarmaUserSearch extends KarmaUser
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['karma_id', 'user_id'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = KarmaUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['user_id' => $this->user_id]);
        $query->andFilterWhere(['karma_id' => $this->karma_id]);

        return $dataProvider;
    }
}
<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hangout;

/**
 * HangoutSearch represents the model behind the search form about `common\models\Hangout`.
 */
class HangoutSearch extends Hangout
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'sport_id', 'started_at', 'finished_at', 'maxjoin', 'createdby_id'], 'integer'],
            [['topic', 'description', 'sportcomplex','location'], 'safe'],
            [['cost'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Hangout::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sport_id' => $this->sport_id,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'maxjoin' => $this->maxjoin,
            'createdby_id' => $this->createdby_id,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'sportcomplex', $this->sportcomplex])
            ->andFilterWhere(['like','location',$this->location]);

        return $dataProvider;
    }
}

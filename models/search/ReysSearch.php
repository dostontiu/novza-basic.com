<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reys;

/**
 * ReysSearch represents the model behind the search form about `app\models\Reys`.
 */
class ReysSearch extends Reys
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'count_people'], 'integer'],
            [['air_place', 'depart_date', 'arrive_date'], 'safe'],
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
        $query = Reys::find();

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
            'name' => $this->name,
            'depart_date' => $this->depart_date,
            'arrive_date' => $this->arrive_date,
            'count_people' => $this->count_people,
        ]);

        $query->andFilterWhere(['like', 'air_place', $this->air_place]);

        return $dataProvider;
    }
}

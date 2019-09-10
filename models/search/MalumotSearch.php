<?php

namespace app\models\search;

use app\models\Group;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Malumot;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * MalumotSearch represents the model behind the search form about `app\models\Malumot`.
 */
class MalumotSearch extends Malumot
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['surname', 'name', 'p_number', 'd_birth', 'gender', 'ex_date', 'is_date', 'today', 'sent', 'group_id'], 'safe'],
            [['tel_number', 'address'], 'string'],
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
        $query = Malumot::find()->with('group');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
//        echo  Html::img('@web/img/inch/KA0741341.jpg');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (!empty($this->id) && empty($this->group_id)){
            $group_id = ArrayHelper::map(Group::find()->where(['reys_id' => $this->id])->all(), 'id', 'id');
        }else{
            $this->id = null;
            $group_id = $this->group_id;
        }
        $d_birth = ($this->d_birth) ? date('Y-m-d', strtotime($this->d_birth)) : null;
        $is_date = ($this->is_date) ? date('Y-m-d', strtotime($this->is_date)) : null;
        $ex_date = ($this->ex_date) ? date('Y-m-d', strtotime($this->ex_date)) : null;

        $query->andFilterWhere([
            'd_birth' => $d_birth,
            'is_date' => $is_date,
            'ex_date' => $ex_date,
            'today' => $this->today,
        ]);
        $query->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'p_number', $this->p_number])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'sent', $this->sent])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'tel_number', $this->tel_number])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['in', 'group_id', $group_id]);
        return $dataProvider;
    }

    public function exportFields()
    {
        return [
            'id' => function ($model) {
                return $model->id;
            },
            'surname',
            'name',
            'p_number',
            'd_birth' => function ($model) {
                return date('d.m.Y',strtotime($model->d_birth));
            },
            'is_date' => function ($model) {
                return date('d.m.Y',strtotime($model->is_date));
            },
            'ex_date' => function ($model) {
                return date('d.m.Y',strtotime($model->ex_date));
            },
            'gender' => function ($model) {
                return $model->gender ? 'Erkak' : 'Ayol';
            },
            'sent' => function ($model) {
                return $model->sent ? 'Jo\'natilgan' : 'Jo\'natilmagan';
            },
            'group_id' => function ($model) {
                if (isset($model->group->name)) {
                    return $model->group->name;
                }
                return 'Guruhi yo\'q';
            },
            'function_id' => function ($model) {
                if (isset($model->function->name)) {
                    return Html::img('http://novza.com/img/inch/KA0741341.jpg');
                }
                return false;
            },
            'mahram_name_id' => function ($model) {
                if (isset($model->mahramName->name)) {
                    return $model->mahramName->name;
                }
            },
            'mahram_id' => function ($model) {
                if (isset($model->mahram->name)) {
                    return $model->mahram->surname.' '.$model->mahram->name.' '.$model->mahram->p_number;
                }
            },
            'tel_number',
            'address',
            'user_id' => function ($model) {
                if (isset($model->user->name)) {
                    return $model->user->name;
                }
                return false;
            },
            'today' => function ($model) {
                return date('d.m.Y',strtotime($model->today));
            },
        ];
    }
}

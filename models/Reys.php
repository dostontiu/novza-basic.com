<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%reys}}".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $reys_name
 * @property string $air_place
 * @property string $depart_date
 * @property string $arrive_date
 * @property integer $count_people
 *
 * @property Group[] $groups
 */
class Reys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%reys}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'air_place', 'depart_date', 'arrive_date', 'count_people'], 'required'],
            [['name', 'count_people'], 'integer'],
            [['depart_date', 'arrive_date'], 'safe'],
            [['air_place', 'reys_name'], 'string', 'max' => 25],
            [['name'], 'unique', 'message'=>$this->name.'-Reys oldindan mavjud'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Reys raqami',
            'air_place' => 'Uchish joyi',
            'depart_date' => 'Uchish kuni',
            'arrive_date' => 'Kelish kuni',
            'count_people' => 'Ziyoratchilar soni',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['reys_id' => 'id']);
    }
}

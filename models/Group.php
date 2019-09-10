<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $name
 * @property integer $reys_id
 * @property integer $region_id
 * @property integer $count_people
 *
 * @property Reys $reys
 * @property Region $region
 * @property Malumot[] $malumots
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'region_id', 'count_people'], 'required'],
            [['reys_id', 'region_id', 'count_people'], 'integer'],
            [['name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Guruh nomi',
            'reys_id' => 'Reys ID',
            'region_id' => 'Qaysi viloyatdan',
            'count_people' => 'Guruhdagi ziyoratchilar soni',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReys()
    {
        return $this->hasOne(Reys::className(), ['id' => 'reys_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMalumots()
    {
        return $this->hasMany(Malumot::className(), ['group_id' => 'id']);
    }
}

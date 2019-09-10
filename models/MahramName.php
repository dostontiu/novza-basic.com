<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahram_name".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Malumot[] $malumots
 */
class MahramName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mahram_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMalumots()
    {
        return $this->hasMany(Malumot::className(), ['mahram_name_id' => 'id']);
    }
}

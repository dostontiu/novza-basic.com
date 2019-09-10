<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "function".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Malumot[] $malumots
 */
class Function1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'function';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32]
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
        return $this->hasMany(Malumot::className(), ['function_id' => 'id']);
    }
}

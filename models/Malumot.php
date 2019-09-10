<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "malumot".
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $p_number
 * @property string $d_birth
 * @property string $gender
 * @property string $ex_date
 * @property string $is_date
 * @property string $today
 * @property string $sent
 * @property integer $group_id
 * @property integer $user_id
 * @property integer $function_id
 * @property integer $mahram_id
 * @property integer $mahram_name_id
 * @property string $tel_number
 * @property string $address
 *
 * @property Group $group
 * @property User $user
 * @property Function $function
 * @property Malumot $mahram
 * @property Malumot[] $malumots
 * @property MahramName $mahramName
 */
class Malumot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'malumot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'p_number', 'd_birth', 'gender', 'ex_date', 'is_date', 'group_id', 'user_id'], 'required'],
            [['d_birth', 'ex_date', 'is_date', 'today'], 'safe'],
            [['gender', 'sent'], 'integer'],
            [['group_id', 'user_id', 'function_id', 'mahram_id', 'mahram_name_id'], 'integer'],
//            [['surname'], 'string', 'max' => 255],
            [['surname', 'name', 'tel_number'], 'string', 'max' => 25],
            ['address', 'string', 'max' => 255],
            [['p_number'], 'string', 'max' => 9],
            [['p_number'], 'unique', 'message'=> $this->p_number.' seriyadagi pasport oldin kiritilgan']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Familiya',
            'name' => 'Ism',
            'p_number' => 'Pasport',
            'd_birth' => 'Tug',
            'gender' => 'Jinsi',
            'ex_date' => 'P tug',
            'is_date' => 'P ber',
            'today' => 'Today',
            'sent' => 'Sent',
            'group_id' => 'Guruh',
            'user_id' => 'User ID',
            'function_id' => 'Function ID',
            'mahram_id' => 'Mahram ID',
            'mahram_name_id' => 'Mahram Name ID',
            'tel_number' => 'Tel Number',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunction()
    {
        return $this->hasOne(Function1::className(), ['id' => 'function_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahram()
    {
        return $this->hasOne(Malumot::className(), ['id' => 'mahram_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMalumots()
    {
        return $this->hasMany(Malumot::className(), ['mahram_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahramName()
    {
        return $this->hasOne(MahramName::className(), ['id' => 'mahram_name_id']);
    }
}

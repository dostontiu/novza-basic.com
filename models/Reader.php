<?php

namespace app\models;

use Yii;

/**
 * @public integer $read

 */
class Reader extends \yii\db\ActiveRecord
{
    public $read;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['read'], 'required', 'message'=>'To\'ldirilmadi'],
            [['read'], 'string', 'min'=>92, 'max'=>92,'message' => 'Tuldiring'],
        ];
    }

    public function group(){
        return 2;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'read' => 'Pasport Reader',
        ];
    }

}

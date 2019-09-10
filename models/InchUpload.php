<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25-Jan-18
 * Time: 12:04 AM
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class InchUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
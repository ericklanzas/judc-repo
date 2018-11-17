<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listatitulos".
 *
 * @property string $Carrera
 * @property string $Definicion
 * @property integer $Id
 * @property string $Acronimo
 */
class Listatitulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listatitulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['Acronimo'], 'required'],
            [['Carrera'], 'string', 'max' => 511],
            [['Definicion', 'Acronimo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Carrera' => 'Carrera',
            'Definicion' => 'Definicion',
            'Id' => 'ID',
            'Acronimo' => 'Acronimo',
        ];
    }
}

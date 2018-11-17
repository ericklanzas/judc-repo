<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "origen".
 *
 * @property integer $Id
 * @property string $Definicion
 *
 * @property Trabajo[] $trabajos
 */
class Origen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'origen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Definicion'], 'required'],
            [['Definicion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Definicion' => 'Definicion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['IdOrigen' => 'Id']);
    }
}

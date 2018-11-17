<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $Id
 * @property string $Definicion
 *
 * @property Puntaje[] $puntajes
 * @property Trabajo[] $trabajos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
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
    public function getPuntajes()
    {
        return $this->hasMany(Puntaje::className(), ['IdCategoria' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['IdCategoria' => 'Id']);
    }
}

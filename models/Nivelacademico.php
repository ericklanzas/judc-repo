<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivelacademico".
 *
 * @property integer $Id
 * @property string $Definicion
 * @property string $Acronimo
 *
 * @property Titulo[] $titulos
 */
class Nivelacademico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivelacademico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Definicion', 'Acronimo'], 'required'],
            [['Definicion', 'Acronimo'], 'string', 'max' => 255],
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
            'Acronimo' => 'Acronimo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulos()
    {
        return $this->hasMany(Titulo::className(), ['IdNivelAcademico' => 'Id']);
    }
}

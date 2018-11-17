<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $Id
 * @property string $Definicion
 * @property string $Acronimo
 *
 * @property Carrera[] $carreras
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
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
    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['IdDepartamento' => 'Id']);
    }
}

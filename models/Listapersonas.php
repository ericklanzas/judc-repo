<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listapersonas".
 *
 * @property string $NombreCompleto
 * @property string $Nombre2
 * @property string $Nombre1
 * @property string $Apellido2
 * @property string $Apellido1
 * @property string $Sexo
 * @property integer $Id
 */
class Listapersonas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listapersonas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreCompleto'], 'string'],
            [['Nombre1', 'Apellido1', 'Sexo'], 'required'],
            [['Id'], 'integer'],
            [['Nombre2', 'Nombre1', 'Apellido2', 'Apellido1'], 'string', 'max' => 255],
            [['Sexo'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NombreCompleto' => 'Nombre Completo',
            'Nombre2' => 'Nombre2',
            'Nombre1' => 'Nombre1',
            'Apellido2' => 'Apellido2',
            'Apellido1' => 'Apellido1',
            'Sexo' => 'Sexo',
            'Id' => 'ID',
        ];
    }
}

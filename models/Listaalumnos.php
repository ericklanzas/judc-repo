<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listaalumnos".
 *
 * @property integer $IdPersona
 * @property string $Carnet
 * @property string $NombreCompleto
 * @property string $Sexo
 * @property string $Carrera
 * @property boolean $Actual
 */
class Listaalumnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listaalumnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'Carnet', 'Sexo'], 'required'],
            [['IdPersona'], 'integer'],
            [['NombreCompleto'], 'string'],
            [['Actual'], 'boolean'],
            [['Carnet'], 'string', 'max' => 8],
            [['Sexo'], 'string', 'max' => 18],
            [['Carrera'], 'string', 'max' => 511],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPersona' => 'Id Persona',
            'Carnet' => 'Carnet',
            'NombreCompleto' => 'Nombre Completo',
            'Sexo' => 'Sexo',
            'Carrera' => 'Carrera',
            'Actual' => 'Actual',
        ];
    }
}

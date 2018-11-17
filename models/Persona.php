<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $Id
 * @property string $Sexo
 * @property string $Nombre2
 * @property string $Nombre1
 * @property string $Apellido2
 * @property string $Apellido1
 *
 * @property Alumno $alumno
 * @property Docente $docente
 * @property Login $login
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Sexo', 'Nombre1', 'Apellido1'], 'required','message' => '{attribute} es requerido'],
            [['Sexo'], 'string', 'max' => 18],
            [['Nombre2', 'Nombre1', 'Apellido2', 'Apellido1'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Sexo' => 'Sexo',
            'Nombre2' => 'Segundo Nombre',
            'Nombre1' => 'Primer Nombre',
            'Apellido2' => 'Segundo Apellido',
            'Apellido1' => 'Primer Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['IdPersona' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['IdPersona' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogin()
    {
        return $this->hasOne(Login::className(), ['IdPersona' => 'Id']);
    }
}

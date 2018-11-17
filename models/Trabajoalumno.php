<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajoalumno".
 *
 * @property int $IdTrabajo
 * @property int $IdPersona
 *
 * @property Alumno $persona
 * @property Trabajo $trabajo
 */
class Trabajoalumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trabajoalumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTrabajo', 'IdPersona'], 'required'],
            [['IdTrabajo', 'IdPersona'], 'integer'],
            [['IdTrabajo', 'IdPersona'], 'unique', 'targetAttribute' => ['IdTrabajo', 'IdPersona']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['IdPersona' => 'IdPersona']],
            [['IdTrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => Trabajo::className(), 'targetAttribute' => ['IdTrabajo' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdTrabajo' => 'Id Trabajo',
            'IdPersona' => 'Id Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Alumno::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajo()
    {
        return $this->hasOne(Trabajo::className(), ['Id' => 'IdTrabajo']);
    }
}

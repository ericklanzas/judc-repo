<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property int $IdPersona
 * @property int $IdTurno
 * @property int $IdCarrera
 * @property string $Carnet
 * @property int $AnioAcademico
 * @property bool $Actual
 *
 * @property Carrera $carrera
 * @property Persona $persona
 * @property Turno $turno
 * @property Trabajoalumno[] $trabajoalumnos
 * @property Trabajo[] $trabajos
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'IdTurno', 'IdCarrera', 'Carnet', 'AnioAcademico'], 'required'],
            [['IdPersona', 'IdTurno', 'IdCarrera', 'AnioAcademico'], 'integer'],
            [['Actual'], 'boolean'],
            [['Carnet'], 'string', 'max' => 8],
            [['IdPersona'], 'unique'],
            [['IdCarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['IdCarrera' => 'IdTitulo']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'Id']],
            [['IdTurno'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['IdTurno' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPersona' => 'Nombre del Alumno',
            'IdTurno' => 'Turno',
            'IdCarrera' => 'Carrera',
            'Carnet' => 'Carnet',
            'AnioAcademico' => 'Año Academico',
            'Actual' => 'Actual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCarrera()
    {
        return $this->hasOne(Carrera::className(), ['IdTitulo' => 'IdCarrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['Id' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurno()
    {
        return $this->hasOne(Turno::className(), ['Id' => 'IdTurno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajoalumnos()
    {
        return $this->hasMany(Trabajoalumno::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['Id' => 'IdTrabajo'])->viaTable('trabajoalumno', ['IdPersona' => 'IdPersona']);
    }
}

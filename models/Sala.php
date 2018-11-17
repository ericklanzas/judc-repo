<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sala".
 *
 * @property integer $Id
 * @property integer $IdJefeSala
 * @property string $InicioExposicion
 * @property string $Definicion
 * @property string $Codigo
 * @property integer $IdAnio
 *
 * @property Jurado[] $jurados
 * @property Anio $idAnio
 * @property Docente $idJefeSala
 * @property Trabajo[] $trabajos
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdJefeSala', 'Definicion', 'Codigo', 'IdAnio'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdJefeSala', 'IdAnio'], 'integer'],
            [['InicioExposicion'], 'safe'],
            [['Definicion'], 'string', 'max' => 255],
            [['Codigo'], 'string', 'max' => 10],
            [['IdAnio'], 'exist', 'skipOnError' => true, 'targetClass' => Anio::className(), 'targetAttribute' => ['IdAnio' => 'Id']],
            [['IdJefeSala'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['IdJefeSala' => 'IdPersona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdJefeSala' => 'Jefe de Sala',
            'InicioExposicion' => 'Fecha de Inicio de Exposicion',
            'Definicion' => 'Definicion',
            'Codigo' => 'Codigo',
            'IdAnio' => 'Anio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurados()
    {
        return $this->hasMany(Jurado::className(), ['IdSala' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnio()
    {
        return $this->hasOne(Anio::className(), ['Id' => 'IdAnio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJefeSala()
    {
        return $this->hasOne(Docente::className(), ['IdPersona' => 'IdJefeSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['IdSala' => 'Id']);
    }
}

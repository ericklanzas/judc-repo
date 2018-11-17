<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anio".
 *
 * @property integer $Id
 * @property integer $Valor
 * @property integer $Estado
 *
 * @property Jurado[] $jurados
 * @property Puntaje[] $puntajes
 * @property Sala[] $salas
 * @property Trabajo[] $trabajos
 */
class Anio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Valor', 'Estado'], 'required'],
            [['Valor', 'Estado'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Valor' => 'Valor',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurados()
    {
        return $this->hasMany(Jurado::className(), ['IdAnio' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuntajes()
    {
        return $this->hasMany(Puntaje::className(), ['IdAnio' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['IdAnio' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['IdAnio' => 'Id']);
    }

    const Estado1 = 1;
    const Estado2 = 2;
    const Estado3 = 3;
    const Estado4 = 4;

    /**
     * @return array
     */
    public static function getEstado()
    {
        return [
            self::Estado1 => 'Abierto',
            self::Estado2 => 'Horarios',
            self::Estado3 => 'Evaluacion',
            self::Estado4 => 'Finalizado',
        ];
    }

    /**
     * @return string
     */
    public function getEstadoLabel()
    {
        return self::getestado()[$this->Estado];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurado".
 *
 * @property integer $Id
 * @property integer $IdTipoParametro
 * @property integer $IdSala
 * @property integer $IdDocente
 * @property integer $IdAnio
 *
 * @property Evaluacion[] $evaluacions
 * @property Anio $idAnio
 * @property Docente $idDocente
 * @property Sala $idSala
 * @property Tipoparametro $idTipoParametro
 */
class Jurado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTipoParametro', 'IdSala', 'IdDocente'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdTipoParametro', 'IdSala', 'IdDocente', 'IdAnio'], 'integer'],
            [['Id','IdTipoParametro', 'IdSala', 'IdDocente', 'IdAnio'], 'unique',
                'targetAttribute' => ['IdTipoParametro', 'IdSala', 'IdDocente', 'IdAnio'],'message' => 'Ya existe un registro identico'],
            [['IdAnio'], 'exist', 'skipOnError' => true, 'targetClass' => Anio::className(), 'targetAttribute' => ['IdAnio' => 'Id']],
            [['IdDocente'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['IdDocente' => 'IdPersona']],
            [['IdSala'], 'exist', 'skipOnError' => true, 'targetClass' => Sala::className(), 'targetAttribute' => ['IdSala' => 'Id']],
            [['IdTipoParametro'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoparametro::className(), 'targetAttribute' => ['IdTipoParametro' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdTipoParametro' => 'Parametros que puede evaluar',
            'IdSala' => 'Sala',
            'IdDocente' => 'Docente',
            'IdAnio' => 'Anio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['IdJurado' => 'Id']);
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
    public function getIdDocente()
    {
        return $this->hasOne(Docente::className(), ['IdPersona' => 'IdDocente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSala()
    {
        return $this->hasOne(Sala::className(), ['Id' => 'IdSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoParametro()
    {
        return $this->hasOne(Tipoparametro::className(), ['Id' => 'IdTipoParametro']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametro".
 *
 * @property integer $Id
 * @property integer $IdTipoParametro
 * @property string $Definicion
 *
 * @property Evaluacion[] $evaluacions
 * @property Tipoparametro $idTipoParametro
 * @property Puntaje[] $puntajes
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTipoParametro', 'Definicion'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdTipoParametro'], 'integer'],
            [['Definicion'], 'string', 'max' => 255],
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
            'IdTipoParametro' => 'Tipo de Parametro',
            'Definicion' => 'Definicion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['IdParametro' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoParametro()
    {
        return $this->hasOne(Tipoparametro::className(), ['Id' => 'IdTipoParametro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuntajes()
    {
        return $this->hasMany(Puntaje::className(), ['IdParametro' => 'Id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "puntaje".
 *
 * @property integer $Id
 * @property string $Valor
 * @property integer $IdParametro
 * @property integer $IdCategoria
 * @property integer $IdAnio
 *
 * @property Anio $idAnio
 * @property Categoria $idCategoria
 * @property Parametro $idParametro
 */
class Puntaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'puntaje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Valor', 'IdParametro', 'IdCategoria', 'IdAnio'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['Valor'], 'number'],
            [['IdParametro', 'IdCategoria', 'IdAnio'], 'integer'],
            [['IdAnio'], 'exist', 'skipOnError' => true, 'targetClass' => Anio::className(), 'targetAttribute' => ['IdAnio' => 'Id']],
            [['IdCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['IdCategoria' => 'Id']],
            [['IdParametro'], 'exist', 'skipOnError' => true, 'targetClass' => Parametro::className(), 'targetAttribute' => ['IdParametro' => 'Id']],
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
            'IdParametro' => 'Parametro',
            'IdCategoria' => 'Categoria',
            'IdAnio' => 'Anio',
        ];
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
    public function getIdCategoria()
    {
        return $this->hasOne(Categoria::className(), ['Id' => 'IdCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdParametro()
    {
        return $this->hasOne(Parametro::className(), ['Id' => 'IdParametro']);
    }
}

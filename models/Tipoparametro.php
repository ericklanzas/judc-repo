<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoparametro".
 *
 * @property integer $Id
 * @property string $Definicion
 *
 * @property Jurado[] $jurados
 * @property Parametro[] $parametros
 */
class Tipoparametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoparametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Definicion'], 'required'],
            [['Definicion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Definicion' => 'Definicion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurados()
    {
        return $this->hasMany(Jurado::className(), ['IdTipoParametro' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametros()
    {
        return $this->hasMany(Parametro::className(), ['IdTipoParametro' => 'Id']);
    }
}

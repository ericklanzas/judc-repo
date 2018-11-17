<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listaanioactual".
 *
 * @property int $IdAnio
 * @property int $ValorAnio
 * @property int $EstadoAnio
 */
class Listaanioactual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listaanioactual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdAnio', 'ValorAnio', 'EstadoAnio'], 'integer'],
            [['ValorAnio', 'EstadoAnio'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAnio' => 'Id Anio',
            'ValorAnio' => 'Valor Anio',
            'EstadoAnio' => 'Estado Anio',
        ];
    }

    public function getAnio()
    {
        return $this->hasOne(Anio::className(), ['IdAnio' => 'IdAnio']);
    }

}

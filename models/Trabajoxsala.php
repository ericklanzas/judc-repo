<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajoxsala".
 *
 * @property int $IdTrabajo
 * @property string $Titulo
 * @property int $IdParametro
 * @property int $IdJurado
 * @property int $IdCategoria
 * @property int $IdSala
 */
class Trabajoxsala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trabajoxsala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTrabajo', 'IdParametro', 'IdJurado', 'IdCategoria', 'IdSala'], 'integer'],
            [['Titulo', 'IdSala'], 'required'],
            [['Titulo'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdTrabajo' => 'Id Trabajo',
            'Titulo' => 'Titulo',
            'IdParametro' => 'Id Parametro',
            'IdJurado' => 'Id Jurado',
            'IdCategoria' => 'Id Categoria',
            'IdSala' => 'Id Sala',
        ];
    }
}

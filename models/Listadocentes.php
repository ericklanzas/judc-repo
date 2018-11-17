<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listadocentes".
 *
 * @property integer $IdPersona
 * @property string $NombreCompleto
 * @property string $Carrera
 * @property string $Acronimo
 */
class Listadocentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listadocentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'Acronimo'], 'required'],
            [['IdPersona'], 'integer'],
            [['NombreCompleto'], 'string'],
            [['Carrera'], 'string', 'max' => 511],
            [['Acronimo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPersona' => 'Id Persona',
            'NombreCompleto' => 'Nombre Completo',
            'Carrera' => 'Carrera',
            'Acronimo' => 'Acronimo',
        ];
    }
}

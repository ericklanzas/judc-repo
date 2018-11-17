<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anioactual".
 *
 * @property int $IdAnio
 */
class Anioactual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anioactual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdAnio'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAnio' => 'Id Anio',
        ];
    }
}

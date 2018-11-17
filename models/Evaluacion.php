<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluacion".
 *
 * @property integer $IdTrabajo
 * @property integer $IdParametro
 * @property integer $IdJurado
 * @property string $Calificacion
 *
 * @property Jurado $idJurado
 * @property Parametro $idParametro
 * @property Trabajo $idTrabajo
 */
class Evaluacion extends \yii\db\ActiveRecord
{

    /**
     * @var array virtual attribute for keeping emails
     */
    public $evaluaciones;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTrabajo', 'IdParametro', 'IdJurado', 'Calificacion'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdTrabajo', 'IdParametro', 'IdJurado'], 'integer'],
            [['Calificacion'], 'number'],
            [['IdJurado'], 'exist', 'skipOnError' => true, 'targetClass' => Jurado::className(), 'targetAttribute' => ['IdJurado' => 'Id']],
            [['IdParametro'], 'exist', 'skipOnError' => true, 'targetClass' => Parametro::className(), 'targetAttribute' => ['IdParametro' => 'Id']],
            [['IdTrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => Trabajo::className(), 'targetAttribute' => ['IdTrabajo' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdTrabajo' => 'Id Trabajo',
            'IdParametro' => 'Id Parametro',
            'IdJurado' => 'Id Jurado',
            'Calificacion' => 'Calificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJurado()
    {
        return $this->hasOne(Jurado::className(), ['Id' => 'IdJurado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdParametro()
    {
        return $this->hasOne(Parametro::className(), ['Id' => 'IdParametro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTrabajo()
    {
        return $this->hasOne(Trabajo::className(), ['Id' => 'IdTrabajo']);
    }
}

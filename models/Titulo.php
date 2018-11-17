<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titulo".
 *
 * @property integer $Id
 * @property integer $IdNivelAcademico
 * @property string $Definicion
 *
 * @property Carrera $carrera
 * @property Docente[] $docentes
 * @property Nivelacademico $idNivelAcademico
 */
class Titulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdNivelAcademico'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdNivelAcademico'], 'integer'],
            [['Definicion'], 'string', 'max' => 255],
            [['IdNivelAcademico'], 'exist', 'skipOnError' => true, 'targetClass' => Nivelacademico::className(), 'targetAttribute' => ['IdNivelAcademico' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdNivelAcademico' => 'Nivel Academico',
            'Definicion' => 'Definicion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['IdTitulo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['IdTitulo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNivelAcademico()
    {
        return $this->hasOne(Nivelacademico::className(), ['Id' => 'IdNivelAcademico']);
    }
}

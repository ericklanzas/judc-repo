<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property integer $IdTitulo
 * @property integer $IdDepartamento
 *
 * @property Alumno[] $alumnos
 * @property Departamento $idDepartamento
 * @property Titulo $idTitulo
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTitulo', 'IdDepartamento'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdTitulo', 'IdDepartamento'], 'integer'],
            [['IdDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['IdDepartamento' => 'Id']],
            [['IdTitulo'], 'exist', 'skipOnError' => true, 'targetClass' => Titulo::className(), 'targetAttribute' => ['IdTitulo' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdTitulo' => 'Titulo',
            'IdDepartamento' => 'Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['IdCarrera' => 'IdTitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['Id' => 'IdDepartamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTitulo()
    {
        return $this->hasOne(Titulo::className(), ['Id' => 'IdTitulo']);
    }
}

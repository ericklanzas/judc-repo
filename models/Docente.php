<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property integer $IdPersona
 * @property integer $IdTitulo
 * @property integer $IdArea
 *
 * @property Area $idArea
 * @property Persona $idPersona
 * @property Titulo $idTitulo
 * @property Jurado[] $jurados
 * @property Sala[] $salas
 * @property Trabajo[] $trabajos
 * @property Trabajo[] $trabajos0
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'IdTitulo', 'IdArea'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdPersona', 'IdTitulo', 'IdArea'], 'integer'],
            [['IdArea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['IdArea' => 'Id']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'Id']],
            [['IdTitulo'], 'exist', 'skipOnError' => true, 'targetClass' => Titulo::className(), 'targetAttribute' => ['IdTitulo' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPersona' => 'Persona',
            'IdTitulo' => 'Titulo del Docente',
            'IdArea' => 'Area de Especializacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArea()
    {
        return $this->hasOne(Area::className(), ['Id' => 'IdArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['Id' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTitulo()
    {
        return $this->hasOne(Titulo::className(), ['Id' => 'IdTitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurados()
    {
        return $this->hasMany(Jurado::className(), ['IdDocente' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['IdJefeSala' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['IdAsesor' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos0()
    {
        return $this->hasMany(Trabajo::className(), ['IdTutor' => 'IdPersona']);
    }
}

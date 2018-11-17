<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajo".
 *
 * @property int $Id
 * @property int $IdTutor
 * @property string $Titulo
 * @property int $IdSala
 * @property bool $PrimerVez
 * @property int $IdOrigen
 * @property string $Observaciones
 * @property string $FechaExposicion
 * @property bool $DocumentoEntregado
 * @property int $IdCategoria
 * @property int $IdAsesor
 * @property int $IdArea
 * @property int $IdAnio
 *
 * @property Evaluacion[] $evaluacions
 * @property Anio $anio
 * @property Area $area
 * @property Categoria $categoria
 * @property Docente $asesor
 * @property Docente $tutor
 * @property Origen $origen
 * @property Sala $sala
 * @property Trabajoalumno[] $trabajoalumnos
 * @property Alumno[] $personas
 */
class Trabajo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trabajo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTutor', 'Titulo', 'IdSala', 'IdOrigen', 'IdCategoria', 'IdArea', 'IdAnio'], 'required','message' => 'Por favor seleccione {attribute}'],
            [['IdTutor', 'IdSala', 'IdOrigen', 'IdCategoria', 'IdAsesor', 'IdArea', 'IdAnio'], 'integer'],
            [['PrimerVez', 'DocumentoEntregado'], 'boolean'],
            [['FechaExposicion'], 'safe'],
            [['Titulo', 'Observaciones'], 'string', 'max' => 18],
            [['IdAnio'], 'exist', 'skipOnError' => true, 'targetClass' => Anio::className(), 'targetAttribute' => ['IdAnio' => 'Id']],
            [['IdArea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['IdArea' => 'Id']],
            [['IdCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['IdCategoria' => 'Id']],
            [['IdAsesor'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['IdAsesor' => 'IdPersona']],
            [['IdTutor'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['IdTutor' => 'IdPersona']],
            [['IdOrigen'], 'exist', 'skipOnError' => true, 'targetClass' => Origen::className(), 'targetAttribute' => ['IdOrigen' => 'Id']],
            [['IdSala'], 'exist', 'skipOnError' => true, 'targetClass' => Sala::className(), 'targetAttribute' => ['IdSala' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdTutor' => 'Tutor',
            'Titulo' => 'Titulo',
            'IdSala' => 'Sala',
            'PrimerVez' => 'Primer Vez?',
            'IdOrigen' => 'Origen',
            'Observaciones' => 'Observaciones',
            'FechaExposicion' => 'Fecha de Exposicion',
            'DocumentoEntregado' => 'Documento Entregado',
            'IdCategoria' => 'Categoria',
            'IdAsesor' => 'Asesor',
            'IdArea' => 'Area',
            'IdAnio' => 'Id Anio',
            //Agregado para calculo de codigo de trabajo
            'codigoSala' => Yii::t('app', 'Codigo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['IdTrabajo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnio()
    {
        return $this->hasOne(Anio::className(), ['Id' => 'IdAnio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['Id' => 'IdArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['Id' => 'IdCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsesor()
    {
        return $this->hasOne(Docente::className(), ['IdPersona' => 'IdAsesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Docente::className(), ['IdPersona' => 'IdTutor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrigen()
    {
        return $this->hasOne(Origen::className(), ['Id' => 'IdOrigen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(Sala::className(), ['Id' => 'IdSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajoalumnos()
    {
        return $this->hasMany(Trabajoalumno::className(), ['IdTrabajo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Alumno::className(), ['IdPersona' => 'IdPersona'])->viaTable('trabajoalumno', ['IdTrabajo' => 'Id']);
    }

    /**
     * AGREGADO PARA GENERAR EL CODIGO DEL TRABAJO
     */

    /* Obtiene codigo de sala y l,o concatena con el Id del trabajo */
    public function getCodigoSala() {
        return $this->sala->Codigo. '-' . $this->Id;
    }
}

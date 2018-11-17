<?php

namespace app\controllers;

use app\models\Anio;
use app\models\Listaalumnos;
use app\models\PersonaSearch;
use app\models\Trabajoalumno;
use Yii;
use yii\base\Model;
use app\models\Trabajo;
use app\models\TrabajoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * TrabajoController implements the CRUD actions for Trabajo model.
 */
class TrabajoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionDatosAlumno($IdPersona)
    {
        $json = Listaalumnos::findOne(['IdPersona'=>$IdPersona]);
        return Json::encode($json);
    }

    /**
     * Lists all Trabajo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrabajoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trabajo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trabajo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    private function GuardarDetalle($Trabajoalumno, $IdTrabajo)
    {
        foreach ($Trabajoalumno as $key =>$value)
        {
            $model = new Trabajoalumno();
            $model['IdTrabajo'] = $IdTrabajo;
            $model['IdPersona'] = $value['IdPersona'];
            $model->save();

        }
    }

    private function eliminarDetalle($detalleOld, $detalleCurrent)
    {
        $IdOld = $this->ResultId($detalleOld);
        $IdCurrent = $this->ResultId($detalleCurrent);

        $detalleEliminar = array_diff($IdOld, $IdCurrent);

        if(count($detalleEliminar)!=0){
            Trabajoalumno::deleteAll(['Id'=>$detalleEliminar]);
        }
    }

    private function ResultId($array)
    {
        $Result = [];

        foreach($array as $key => $value){
            $Result[$key] = $value['Id'];
        }

        return $Result;
    }

    private function ActualizarDetalle($Trabajoalumno, $model)
    {
        $detalleOld = [];
        $detalleCurrent = [];
        $detalleEntrada =[];

        if (count($model->$Trabajoalumnos)>0){
            $detalleAsString = Json::encode($model->$Trabajoalumnos);
            $detalleOld = Json::decode($detalleAsString);
        }

        foreach($Trabajoalumno as $key => $value){
            if (count($value) < 7){
                $detalleEntrada[$key] = $value;
            }
            else $detalleCurrent[$key] = $value;
        }

        if (count($detalleEntrada)!=0)
            $this->GuardarDetalle($detalleEntrada, $model->Id);

        $this->eliminarDetalle($detalleOld, $detalleCurrent);
    }

    public function actionCreate()
    {
        $model = new Trabajo();

        // CONSULTANDO LA VISTA DE ANIOACTUAL PARA OBTENER EL VALOR DEL ANIO ACTUAL
        $idanio=(new \yii\db\Query())
            ->select(['IdAnio'])
            ->from('Anioactual')
            ->scalar();

//        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();
            // insertando anio
            $model->attributes = $post;
            $model->IdAnio = $idanio;

            $model->save();
            $this->GuardarDetalle(Json::decode($post['Trabajoalumno']), $model->Id);

            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Trabajo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();
            $this->ActualizarDetalle(Json::decode($post['Trabajoalumno']), $model);
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Trabajo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trabajo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trabajo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trabajo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

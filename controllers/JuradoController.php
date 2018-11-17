<?php

namespace app\controllers;

use Yii;
use app\models\Jurado;
use app\models\JuradoSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;


/**
 * JuradoController implements the CRUD actions for Jurado model.
 */
class JuradoController extends Controller
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

    /**
     * Lists all Jurado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JuradoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jurado model.
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
     * Creates a new Jurado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jurado();


// CONSULTANDO LA VISTA DE ANIOACTUAL PARA OBTENER EL VALOR DEL ANIO ACTUAL
        $idanio=(new \yii\db\Query())
            ->select(['IdAnio'])
            ->from('Anioactual')
            ->scalar();

//          CUALQUIERA DE ESTAS DOS FUNCIONA, PERO SOLO CON EL PRIMER A;O, O CON EL A;O DEL SISTEMA
//        $anio = Listaanioactual::findOne(['IdAnio' => 1, 'EstadoAnio' => 1])->IdAnio;
//        $idanio =  Anio::findOne(['Valor'=>date('Y')])->Id;
        if ($model->load(Yii::$app->request->post())) {

            // insertando anio
            $post = Yii::$app->request->post();
            $model->attributes = $post;
            $model->IdAnio = $idanio;

            $model->save();
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jurado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jurado model.
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
     * Finds the Jurado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jurado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jurado::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionValidacion()
    {
        $model = new Jurado();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }
}

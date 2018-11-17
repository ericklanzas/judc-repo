<?php

namespace app\controllers;

use Yii;
use app\models\Trabajoalumno;
use app\models\TrabajoalumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrabajoalumnoController implements the CRUD actions for Trabajoalumno model.
 */
class TrabajoalumnoController extends Controller
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
     * Lists all Trabajoalumno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrabajoalumnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trabajoalumno model.
     * @param integer $IdPersona
     * @param integer $Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdPersona, $Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdPersona, $Id),
        ]);
    }

    /**
     * Creates a new Trabajoalumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trabajoalumno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdPersona' => $model->IdPersona, 'Id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajoalumno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdPersona
     * @param integer $Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdPersona, $Id)
    {
        $model = $this->findModel($IdPersona, $Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdPersona' => $model->IdPersona, 'Id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trabajoalumno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdPersona
     * @param integer $Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdPersona, $Id)
    {
        $this->findModel($IdPersona, $Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trabajoalumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdPersona
     * @param integer $Id
     * @return Trabajoalumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdPersona, $Id)
    {
        if (($model = Trabajoalumno::findOne(['IdPersona' => $IdPersona, 'Id' => $Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

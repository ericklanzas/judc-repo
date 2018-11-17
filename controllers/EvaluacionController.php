<?php

namespace app\controllers;

use app\models\Categoria;
use app\models\PuntajeSearch;
use app\models\Trabajo;
use app\models\TrabajoSearch;
use Yii;
use app\models\Evaluacion;
use app\models\EvaluacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Puntaje;
use yii\helpers\Json;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * EvaluacionController implements the CRUD actions for Evaluacion model.
 */
class EvaluacionController extends Controller
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
     * Lists all Evaluacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EvaluacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $IdJurado = Yii::$app->user->id;
//        $IdJurado = 6;

        $IdSala =(new \yii\db\Query())
            ->select(['jurado.IdSala'])
            ->from('Jurado')
            ->innerJoin('Trabajo','trabajo.IdSala = jurado.IdSala')
            ->where(['jurado.IdDocente' => $IdJurado])
            ->scalar();

        $searchTrabajo = new TrabajoSearch(['IdSala'=>$IdSala]);
        $dataTrabajo = $searchTrabajo->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchTrabajo' => $searchTrabajo,
            'dataTrabajo' => $dataTrabajo,
        ]);
    }



    private function GuardarEvaluacion($Parametros, $IdTrabajo, $IdJurado)
    {
        Yii::$app->session->setFlash('success', "insertando datos");

        foreach ($Parametros as $key =>$value)
        {
            $model = new Evaluacion();
            $model['IdTrabajo'] = $IdTrabajo;
            $model['IdJurado'] = $IdJurado;
            $model['IdParametro'] = $value['IdParametro'];
            $model['Calificacion'] = $value['Calificacion'];
            $model->save();
            echo 'llego hasta aqui';

        }
    }

    /**
     * Displays a single Evaluacion model.
     * @param integer $IdTrabajo
     * @param integer $IdParametro
     * @param integer $IdJurado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdTrabajo, $IdParametro, $IdJurado)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdTrabajo, $IdParametro, $IdJurado),
        ]);
    }

    /**
     * Creates a new Evaluacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateOri()
    {
        $model = new Evaluacion();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'IdTrabajo' => $model->IdTrabajo, 'IdParametro' => $model->IdParametro, 'IdJurado' => $model->IdJurado]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreate2()
    {
        $model = new Evaluacion();

        $IdJurado = Yii::$app->user->id;

        Yii::$app->session->setFlash('success', "PCreada la instancia");

        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();
            $model->save();
            Yii::$app->session->setFlash('success', "llamando al guardado");
            $this->GuardarEvaluacion(Json::decode($post['evaluacion']), $model->IdTrabajo, $IdJurado, $model->IdParametro);
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
            Yii::$app->session->setFlash('success', "No entro al guardado");
        }
    }

    public function actionCreate()
    {
        $count = count(Yii::$app->request->post('evaluacion', []));
        $evaluaciones = [];
        //VarDumper::dump(Yii::$app->request->post(), 10, true); exit;
        for ($i = 0; $i < $count; $i++) {
            $evaluaciones[] = new Evaluacion();
            Yii::$app->session->setFlash('success', "Processed $count records successfully.");
        }
        if ($evaluaciones->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('error', "entra al if.");

            if (Evaluacion::loadMultiple($evaluaciones, Yii::$app->request->post())) {
            foreach ($evaluaciones as $evaluacion) {
                Yii::$app->session->setFlash('success', "creando instancias");
                $evaluacion->setAtrributes($evaluaciones);
                $evaluacion->save();
                }
            }
            return $this->render('create', [
                'model' => $evaluacion,
            ]);
            Yii::$app->session->setFlash('success', "if perfecto");
        }
    }

    /**
     * Updates an existing Evaluacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdTrabajo
     * @param integer $IdParametro
     * @param integer $IdJurado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdTrabajo, $IdParametro, $IdJurado)
    {
        $model = $this->findModel($IdTrabajo, $IdParametro, $IdJurado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdTrabajo' => $model->IdTrabajo, 'IdParametro' => $model->IdParametro, 'IdJurado' => $model->IdJurado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Evaluacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdTrabajo
     * @param integer $IdParametro
     * @param integer $IdJurado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdTrabajo, $IdParametro, $IdJurado)
    {
        $this->findModel($IdTrabajo, $IdParametro, $IdJurado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Evaluacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdTrabajo
     * @param integer $IdParametro
     * @param integer $IdJurado
     * @return Evaluacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdTrabajo, $IdParametro, $IdJurado)
    {
        if (($model = Evaluacion::findOne(['IdTrabajo' => $IdTrabajo, 'IdParametro' => $IdParametro, 'IdJurado' => $IdJurado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCalificara()
    {
        $model = new Puntaje();
        $post = Yii::$app->request->post();
        // process ajax delete
        if (Yii::$app->request->isAjax && isset($post['kvdelete'])) {
            echo Json::encode([
                'success' => true,
                'messages' => [
                    'kv-detail-info' => 'The book # 1000 was successfully deleted. ' .
                        Html::a('<i class="glyphicon glyphicon-hand-right"></i>  Click aqui',
                            ['/site/evaluacion/calificar'], ['class' => 'btn btn-sm btn-info']) . ' para proceder.'
                ]
            ]);
            return;
        }
        // return messages on update of record
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-success', 'Todo OK');
            Yii::$app->session->setFlash('kv-detail-warning', 'Hay algo mal');
        }
        return $this->render('calificar', ['model'=>$model]);
    }


    public function actionCalificar($IdTrabajo,$IdTipoParametro)
    {
        $evaluacion = new Evaluacion();
        $IdJurado=Yii::$app->user->id;

        //CONSULTANDO VALORES PARA MOSTRAR SOLO PARAMETROS DE LA CATEGORIA DEL TRABAJO

        $IdCategoria=(new \yii\db\Query())
            ->select(['IdCategoria'])
            ->from('Trabajo')
            ->where(['trabajo.Id' => $IdTrabajo])
            ->scalar();

        //SE MUESTRAN LOS PUNTAJES, EN DEPENDENCIA DE SI EN LA VISTA SE SELECCIONO LA EVALUACION ESCRITA O EXPUESTA

        $IdParametro =(new \yii\db\Query())
            ->select(['parametro.Id'])
            ->from('Parametro')
            ->innerJoin('Puntaje','puntaje.IdParametro = parametro.Id')
            ->where(['parametro.IdTipoParametro' => $IdTipoParametro]);

//        $IdParametro2 =(new \yii\db\Query())
//        ->select(['puntaje.IdParametro'])
//        ->from('Trabajo')
//            ->innerJoin('Puntaje','trabajo.IdCategoria = puntaje.IdCategoria')
//            ->where(['trabajo.Id' => $IdTrabajo])
//            ->andWhere(['trabajo.IdCategoria' => $IdCategoria])
//        ->scalar();

        $searchModel=new PuntajeSearch();
//        $searchModel = new PuntajeSearch(['IdCategoria'=>$IdCategoria,'IdCategoria'=>$IdCategoria]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['IdCategoria'=>$IdCategoria,'IdParametro'=>$IdParametro]);
        $filas = $dataProvider->getTotalCount();


        return $this->render('calificar', [
                            'evaluacion'=>$evaluacion,
                            'IdJurado'=>$IdJurado,
                            'IdTrabajo'=>$IdTrabajo,
                            'IdParametro'=>$IdParametro,
                            'filas'=>$filas,
//            'evaluaciones'=>$evaluaciones,
                            'dataProvider'=>$dataProvider,
                            ]);

//        return $this->render('view', [
//            'model' => $this->findModel($IdTrabajo, $Categoria, $IdJurado),
//        ]);
    }


    public function actionCalifica1($IdTrabajo,$IdTipoParametro)
    {
        $evaluacion = new Evaluacion();
        $IdJurado=Yii::$app->user->id;


        //CONSULTANDO VALORES PARA MOSTRAR SOLO PARAMETROS DE LA CATEGORIA DEL TRABAJO

        $IdCategoria=(new \yii\db\Query())
            ->select(['IdCategoria'])
            ->from('Trabajo')
            ->where(['trabajo.Id' => $IdTrabajo])
            ->scalar();

        //SE MUESTRAN LOS PUNTAJES, EN DEPENDENCIA DE SI EN LA VISTA SE SELECCIONO LA EVALUACION ESCRITA O EXPUESTA

        $IdParametro =(new \yii\db\Query())
            ->select(['parametro.Id'])
            ->from('Parametro')
            ->innerJoin('Puntaje','puntaje.IdParametro = parametro.Id')
            ->where(['parametro.IdTipoParametro' => $IdTipoParametro]);

        $searchModel=new PuntajeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['IdCategoria'=>$IdCategoria,'IdParametro'=>$IdParametro]);
        $filas = $dataProvider->getTotalCount();


        return $this->render('calificar', [
            'evaluacion'=>$evaluacion,
            'IdJurado'=>$IdJurado,
            'IdTrabajo'=>$IdTrabajo,
            'IdParametro'=>$IdParametro,
            'filas'=>$filas,
//            'evaluaciones'=>$evaluaciones,
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionCalifica($IdTrabajo, $IdTipoParametro)
    {
        $evaluacion = new Evaluacion();
        $IdJurado=Yii::$app->user->id;

        //CONSULTANDO VALORES PARA MOSTRAR SOLO PARAMETROS DE LA CATEGORIA DEL TRABAJO
        $IdCategoria=(new Query())
            ->select(['IdCategoria'])
            ->from('Trabajo')
            ->where(['trabajo.Id' => $IdTrabajo])
            ->scalar();

        //SE MUESTRAN LOS PUNTAJES, EN DEPENDENCIA DE SI EN LA VISTA SE SELECCIONO LA EVALUACION ESCRITA O EXPUESTA

        $IdParametro =(new Query())
            ->select(['parametro.Id'])
            ->from('Parametro')
            ->innerJoin('Puntaje','puntaje.IdParametro = parametro.Id')
            ->where(['parametro.IdTipoParametro' => $IdTipoParametro]);

        $puntajes=(new Query())
            ->select(['valor'])
            ->from('puntaje')
            ->where(['IdCategoria'=>$IdCategoria])
            ->andWhere(['IdParametro'=>$IdParametro]);
//            ->scalar();

        $puntajes2 = Puntaje::find()
            ->where(['IdCategoria'=>$IdCategoria])
            ->andWhere(['IdParametro'=>$IdParametro]);

        $dataProvider = new ActiveDataProvider([
            'query' => $puntajes2,
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'IdParametro' => SORT_DESC,
                    'Valor' => SORT_ASC,
                ]
            ],
        ]);


        if ($evaluacion->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
//            VarDumper::dump($post,10,true); exit;
            echo  $post['Evaluacion'];
            $detalle = $post['Evaluacion'];
            foreach ($detalle as $campo){
                $evaluacion = new Evaluacion();
                $evaluacion->IdParametro = $IdParametro;
                $evaluacion->IdJurado = $IdTrabajo;
                $evaluacion->IdTrabajo = $IdTrabajo;
                $evaluacion->Calificacion = $campo;
                $evaluacion->save();
            }
        } else {

            return $this->render('califica', [
                'evaluacion'=>$evaluacion,
//                'IdJurado'=>$IdJurado,
//                'IdTrabajo'=>$IdTrabajo,
//                'IdParametro'=>$IdParametro,

                'dataProvider'=>$dataProvider,

            ]);
        }
    }
}

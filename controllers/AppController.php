<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Configuracion;
use app\models\Anio;

/**
 * AppController implements the Custom actions for App.
 */
class AppController extends Controller
{
    public function setIdAnio()
    {
        $anio = new Anio();
        $confanio = new Configuracion();

        if ($anio->Valor == $confanio->Valor)
        {
            $idanio =  Anio::findOne(['Valor'=>date('Y')])->Id;
            return $idanio;
        }
        else
        {
            return 20;
        }
    }

    public function actionEstadoAnio()
    {
        $anio = new Anio();

        switch ($anio->Estado) {
            case 1:
                echo "i es una manzana";
                break;
            case 2:
                echo "i es una barra";
                break;
            case 3:
                echo "i es un pastel";
                break;
            case 4:
                echo "i es un pastel";
                break;
        }
    }

}

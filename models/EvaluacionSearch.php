<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evaluacion;

/**
 * EvaluacionSearch represents the model behind the search form of `app\models\Evaluacion`.
 */
class EvaluacionSearch extends Evaluacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTrabajo', 'IdParametro', 'IdJurado'], 'integer'],
            [['Calificacion'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Evaluacion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdTrabajo' => $this->IdTrabajo,
            'IdParametro' => $this->IdParametro,
            'IdJurado' => $this->IdJurado,
            'Calificacion' => $this->Calificacion,
        ]);

        return $dataProvider;
    }

    public function puntajes($params)
    {

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
            ->select(['*'])
            ->from('puntaje')
            ->where(['IdCategoria'=>$IdCategoria])
            ->andWhere(['IdParametro'=>$IdParametro])
            ->scalar();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'IdCategoria' => $IdCategoria,
            'IdParametro' => $IdParametro,
            'puntajes' => $puntajes,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdTrabajo' => $this->IdTrabajo,
            'IdParametro' => $this->IdParametro,
            'IdJurado' => $this->IdJurado,
            'Calificacion' => $this->Calificacion,
        ]);

        return $dataProvider;
    }
}

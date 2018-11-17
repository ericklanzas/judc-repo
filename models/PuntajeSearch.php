<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Puntaje;

/**
 * PuntajeSearch represents the model behind the search form about `app\models\Puntaje`.
 */
class PuntajeSearch extends Puntaje
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'IdParametro', 'IdCategoria', 'IdAnio'], 'integer'],
            [['Valor'], 'number'],
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
        $query = Puntaje::find();

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
            'Id' => $this->Id,
            'Valor' => $this->Valor,
            'IdParametro' => $this->IdParametro,
            'IdCategoria' => $this->IdCategoria,
            'IdAnio' => $this->IdAnio,
        ]);

        return $dataProvider;
    }
}

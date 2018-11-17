<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trabajo;

/**
 * TrabajoSearch represents the model behind the search form about `app\models\Trabajo`.
 */
class TrabajoSearch extends Trabajo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'IdTutor', 'IdSala', 'IdOrigen', 'IdCategoria', 'IdAsesor', 'IdArea', 'IdAnio'], 'integer'],
            [['Titulo', 'Observaciones', 'FechaExposicion'], 'safe'],
            [['PrimerVez', 'DocumentoEntregado'], 'boolean'],
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
        $query = Trabajo::find();

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
            'IdTutor' => $this->IdTutor,
            'IdSala' => $this->IdSala,
            'PrimerVez' => $this->PrimerVez,
            'IdOrigen' => $this->IdOrigen,
            'FechaExposicion' => $this->FechaExposicion,
            'DocumentoEntregado' => $this->DocumentoEntregado,
            'IdCategoria' => $this->IdCategoria,
            'IdAsesor' => $this->IdAsesor,
            'IdArea' => $this->IdArea,
            'IdAnio' => $this->IdAnio,
        ]);

        $query->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones]);

        return $dataProvider;
    }
}

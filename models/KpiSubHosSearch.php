<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KpiSubHos;

/**
 * KpiSubHosSearch represents the model behind the search form about `app\models\KpiSubHos`.
 */
class KpiSubHosSearch extends KpiSubHos {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['year', 'month', 'hospcode', 'hospname', 'provcode', 'ampcode'], 'safe'],
            [['q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = KpiSubHos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'q1' => $this->q1,
            'q2' => $this->q2,
            'q3' => $this->q3,
            'q4' => $this->q4,
            'q5' => $this->q5,
            'q6' => $this->q6,
            'q7' => $this->q7,
            'q8' => $this->q8,
            'q9' => $this->q9,
            'q10' => $this->q10,
        ]);

        $query->andFilterWhere(['like', 'year', $this->year])
                ->andFilterWhere(['like', 'month', $this->month])
                ->andFilterWhere(['like', 'hospcode', $this->hospcode])
                ->andFilterWhere(['like', 'hospname', $this->hospname])
                ->andFilterWhere(['like', 'provcode', $this->provcode])
                ->andFilterWhere(['like', 'ampcode', $this->ampcode]);

        return $dataProvider;
    }

}

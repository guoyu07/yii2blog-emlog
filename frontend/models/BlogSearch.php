<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Blog;

/**
 * BlogSearch represents the model behind the search form about `common\models\Blog`.
 */
class BlogSearch extends Blog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid', 'date', 'author', 'sortid', 'views', 'comnum', 'attnum'], 'integer'],
            [['title', 'content', 'excerpt', 'alias', 'type', 'top', 'sortop', 'hide', 'checked', 'allow_remark', 'password', 'template', 'tags'], 'safe'],
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
        $query = Blog::find();

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
            'gid' => $this->gid,
            'date' => $this->date,
            'author' => $this->author,
            'sortid' => $this->sortid,
            'views' => $this->views,
            'comnum' => $this->comnum,
            'attnum' => $this->attnum,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'excerpt', $this->excerpt])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'top', $this->top])
            ->andFilterWhere(['like', 'sortop', $this->sortop])
            ->andFilterWhere(['like', 'hide', $this->hide])
            ->andFilterWhere(['like', 'checked', $this->checked])
            ->andFilterWhere(['like', 'allow_remark', $this->allow_remark])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}

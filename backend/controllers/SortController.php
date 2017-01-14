<?php

namespace backend\controllers;
use Yii;
use yii\helpers\Url;
use common\models\Sort;
use yii\helpers\ArrayHelper;

class SortController extends \yii\web\Controller
{
    public function actionCreate()
    {


        if(Yii::$app->request->isPost){

            $post = Yii::$app->request->post();
            $model = new Sort();
            if($model->load($post,'') && $model->save()){
                $this->redirect(Url::toRoute(['index','active_add'=>1]));
                return;
            }
        }

        $this->redirect(Url::toRoute(['index','error_d'=>1]));

    }

    public function actionEdit($sid)
    {
        if(($sid = (int)$sid) > 0){
            $model = Sort::find()->where(['sid'=>$sid])->asArray()->one();
            $sorts = Sort::find()->asArray()->indexBy('sid')->all();
            foreach ($sorts as $k=>$v){
                if(isset($sorts[$v['pid']]))
                    $sorts[$v['pid']]['children'][] = $v['sid'];
            }
            return $this->render('edit',$model + ['sorts' => $sorts]);

        }

        $this->redirect(Url::toRoute(['index']));
    }

    public function actionIndex()
    {

        $sorts = Sort::find()->with('blogs')->asArray()->indexBy('sid')->all();
        foreach ($sorts as $k=>$v){
           if(isset($sorts[$v['pid']]))
               $sorts[$v['pid']]['children'][] = $v['sid'];
        }

        return $this->render('index',[
            'sorts' => $sorts,
        ]);
    }

    public function actionTaxis()
    {

        if(Yii::$app->request->isPost){
            $post = (array)Yii::$app->request->post('sort');
            $status = false;
            foreach ($post as $k => $v){
                if($model = Sort::findOne($k)){
                    $model->taxis = $v;
                    $model->save(true,['taxis']) && $status = true;
                }
            }

            if($status === true){
                $this->redirect(Url::toRoute(['index','active_taxis'=>1]));
            }else{
                $this->redirect(Url::toRoute(['index','error_b'=>1]));
            }

        }
    }

    public function actionUpdate()
    {

        if(Yii::$app->request->isPost){


            $post = Yii::$app->request->post();
            $model = Sort::findOne((int)$post['sid']);
            if($model->load($post,'') && $model->save()){
                $this->redirect(Url::toRoute(['index','active_edit'=>1]));
                return;
            }
        }

        $this->redirect(Url::toRoute(['index','error_f'=>1]));

    }

    public function actionDel($sid){
        if(is_string($sid)){

            $sid = [$sid];
        }
        $status = Sort::deleteAll(['in','sid',implode(',',$sid)]);
        if($status){
            $this->redirect(Url::toRoute(['index','active_del'=>1]));
        }else{
            $this->redirect(Url::toRoute(['index','error_a'=>1]));
        }

    }


}

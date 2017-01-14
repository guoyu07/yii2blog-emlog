<?php

namespace backend\controllers;
use Yii;
use common\models\Tag;
use yii\helpers\Url;

class TagController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $tags = Tag::find()->all();
        return $this->render('index',['tags'=>$tags]);
    }

    public function actionEdit($tid){


        $tid = intval($tid);
        $model = Tag::findOne($tid);
        if($model){
            return $this->render('edit',[
                'tid'=>$model->tid,
                'tagname'=>$model->tagname
            ]);
        }else{
            $this->redirect(Url::toRoute(['index','error_edit'=>1]));

        }
    }

    public function actionUpdate(){
        $post = Yii::$app->request->post();
        $tid = (int)$post['tid'];
        $model = Tag::findOne($tid);
        if($model->load($post,'') && $model->save(true,['tagname'])){
            $this->redirect(Url::toRoute(['index','active_edit'=>1]));
        }else{
            $this->redirect(Url::toRoute(['index','error_edit'=>1]));
        }
    }


    public function actionDel(){

        $tids = (array)Yii::$app->request->post('tids');

        $status = Tag::deleteAll(['in','tid',implode(',',$tids)]);
        if($status){
            $this->redirect(Url::toRoute(['index','active_del'=>1]));
        }else{
            $this->redirect(Url::toRoute(['index','error_a'=>1]));
        }
    }

}

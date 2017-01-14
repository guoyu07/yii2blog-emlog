<?php

namespace backend\controllers;
use common\models\Log;
use common\models\Sort;
use common\models\Tag;

class LogController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDel()
    {
        return $this->render('del');
    }

    public function actionEdit($gid)
    {
        $gid = (int)$gid;

        $att_frame_url = 'attachment.php?action=attlib&logid='.$gid;

        $log = Log::find()->where(['gid'=>$gid])->asArray()->one();

        $sorts = Sort::find()->asArray()->indexBy('sid')->all();
        foreach ($sorts as $k=>$v){
            if(isset($sorts[$v['pid']]))
                $sorts[$v['pid']]['children'][] = $v['sid'];
        }

        $tagStr = Tag::find()->select('tagname')->where(['in','tid',explode(',',$log['tags'])])->asArray()->indexBy('tagname')->all();
        $tagStr = implode(',',array_keys($tagStr));

        $tags = Tag::find()->asArray()->all();
        return $this->render('edit',array_merge($log,
            ['att_frame_url'=>$att_frame_url,'sorts'=>$sorts,'tagStr'=>$tagStr,'tags'=>$tags]

            )
        );
    }

    public function actionHide()
    {
        return $this->render('hide');
    }

    public function actionIndex($pid='',$sid = 0,$tagid = 0,$uid=0)
    {
        //pid 分类草稿箱
        $sid = (int)$sid;
        $tagid = (int)$tagid;
        $uid = (int)$uid;
        $sorts = Sort::find()->asArray()->indexBy('sid')->all();
        foreach ($sorts as $k=>$v){
            if(isset($sorts[$v['pid']]))
                $sorts[$v['pid']]['children'][] = $v['sid'];
        }

        $tags = Tag::find()->asArray()->all();

        $logs = Log::find()->asArray()->all();
        return $this->render('index',[
            'pid'=>$pid,
            'sorts'=>$sorts,
            'sid'=>$sid,
            'tagId'=>$tagid,
            'uid'=>$uid,
            'tags'=>$tags,
            'logs'=>$logs,
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}

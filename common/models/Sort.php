<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sort}}".
 *
 * @property string $sid
 * @property string $sortname
 * @property string $alias
 * @property string $taxis
 * @property string $pid
 * @property string $description
 * @property string $template
 */
class Sort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sort}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taxis', 'pid'], 'integer'],
            [['description'], 'required'],
            [['description'], 'string'],
            [['sortname', 'template'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sid' => Yii::t('app', 'Sid'),
            'sortname' => Yii::t('app', 'Sortname'),
            'alias' => Yii::t('app', 'Alias'),
            'taxis' => Yii::t('app', 'Taxis'),
            'pid' => Yii::t('app', 'Pid'),
            'description' => Yii::t('app', 'Description'),
            'template' => Yii::t('app', 'Template'),
        ];
    }

    /**
     * @inheritdoc
     * @return SortQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SortQuery(get_called_class());
    }

    public function getBlogs(){
        return $this->hasMany(Blog::className(),['sortid'=>'sid']);
    }

    public function getChildren(){
        return $this->hasMany(Sort::className(),['pid'=>'sid']);
    }
}

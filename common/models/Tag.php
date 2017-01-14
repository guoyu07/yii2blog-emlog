<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $tid
 * @property string $tagname
 * @property string $gid
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid'], 'required'],
            [['gid'], 'string'],
            [['tagname'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tid' => Yii::t('app', 'Tid'),
            'tagname' => Yii::t('app', 'Tagname'),
            'gid' => Yii::t('app', 'Gid'),
        ];
    }

    /**
     * @inheritdoc
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }
}

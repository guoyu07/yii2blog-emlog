<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property string $gid
 * @property string $title
 * @property string $date
 * @property string $content
 * @property string $excerpt
 * @property string $alias
 * @property integer $author
 * @property integer $sortid
 * @property string $type
 * @property string $views
 * @property string $comnum
 * @property string $attnum
 * @property string $top
 * @property string $sortop
 * @property string $hide
 * @property string $checked
 * @property string $allow_remark
 * @property string $password
 * @property string $template
 * @property string $tags
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'content', 'excerpt'], 'required'],
            [['date', 'author', 'sortid', 'views', 'comnum', 'attnum'], 'integer'],
            [['content', 'excerpt', 'top', 'sortop', 'hide', 'checked', 'allow_remark', 'tags'], 'string'],
            [['title', 'password', 'template'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => Yii::t('app', 'Gid'),
            'title' => Yii::t('app', 'Title'),
            'date' => Yii::t('app', 'Date'),
            'content' => Yii::t('app', 'Content'),
            'excerpt' => Yii::t('app', 'Excerpt'),
            'alias' => Yii::t('app', 'Alias'),
            'author' => Yii::t('app', 'Author'),
            'sortid' => Yii::t('app', 'Sortid'),
            'type' => Yii::t('app', 'Type'),
            'views' => Yii::t('app', 'Views'),
            'comnum' => Yii::t('app', 'Comnum'),
            'attnum' => Yii::t('app', 'Attnum'),
            'top' => Yii::t('app', 'Top'),
            'sortop' => Yii::t('app', 'Sortop'),
            'hide' => Yii::t('app', 'Hide'),
            'checked' => Yii::t('app', 'Checked'),
            'allow_remark' => Yii::t('app', 'Allow Remark'),
            'password' => Yii::t('app', 'Password'),
            'template' => Yii::t('app', 'Template'),
            'tags' => Yii::t('app', 'Tags'),
        ];
    }

    /**
     * @inheritdoc
     * @return BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlogQuery(get_called_class());
    }
}

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
class Log extends \common\models\Blog
{

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


    public static function find()
    {
        return new BlogQuery(get_called_class());
    }
}

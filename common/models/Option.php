<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%options}}".
 *
 * @property string $option_id
 * @property string $option_name
 * @property string $option_value
 */
class Option extends \yii\db\ActiveRecord
{

    const EMLOG_VERSION = '1.0';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%options}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_name', 'option_value'], 'required'],
            [['option_value'], 'string'],
            [['option_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => Yii::t('app', 'Option ID'),
            'option_name' => Yii::t('app', 'Option Name'),
            'option_value' => Yii::t('app', 'Option Value'),
        ];
    }

    /**
     * @inheritdoc
     * @return OptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OptionQuery(get_called_class());
    }

    public static function get($option){

        //$options = self::find()->asArray()->all();
        //$options_cache = ArrayHelper::map($options,'option_name','option_value');

        $CACHE = new Cache();
        $options_cache = $CACHE->readCache('options');
        if (isset($options_cache[$option])) {
            switch ($option) {
                case 'active_plugins':
                case 'navibar':
                case 'widget_title':
                case 'custom_widget':
                case 'widgets1':
                case 'widgets2':
                case 'widgets3':
                case 'widgets4':
                case 'custom_topimgs':
                    if (!empty($options_cache[$option])) {
                        return @unserialize($options_cache[$option]);
                    } else{
                        return array();
                    }
                    break;
                case 'blogurl':
                    if ($options_cache['detect_url'] == 'y') {
                        return realUrl();
                    }
                    else {
                        return $options_cache['blogurl'];
                    }
                    break;
                default:
                    return $options_cache[$option];
                    break;
            }
        }
    }


}

<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * Html provides a set of static methods for generating commonly used HTML tags.
 *
 * Nearly all of the methods in this class allow setting additional html attributes for the html
 * tags they generate. You can specify for example. 'class', 'style'  or 'id' for an html element
 * using the `$options` parameter. See the documentation of the [[tag()]] method for more details.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Html extends BaseHtml
{
    /**
     * 转换HTML代码函数
     *
     * @param unknown_type $content
     * @param unknown_type $wrap 是否换行
     */
    public static function htmlClean($content, $nl2br = true) {
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
        if ($nl2br) {
            $content = nl2br($content);
        }
        $content = str_replace('  ', '&nbsp;&nbsp;', $content);
        $content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $content);
        return $content;
    }


}

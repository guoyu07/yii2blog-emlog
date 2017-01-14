<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');


//将helpers 挪到common里

Yii::$classMap['yii\helpers\StringHelper'] = '@common/helpers/StringHelper.php';
Yii::$classMap['yii\helpers\Html'] = '@common/helpers/Html.php';

$userData = array();
define('ISLOGIN',1);

//用户组:admin管理员, writer联合撰写人, visitor访客
define('ROLE_ADMIN', 'admin');
define('ROLE_WRITER', 'writer');
define('ROLE_VISITOR', 'visitor');
//用户角色
define('ROLE', ISLOGIN === true ? $userData['role'] : ROLE_VISITOR);
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : '');

<?php


use common\models\Option;
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
AppAsset::register($this);

$theme= $this->theme;
$assets =  $theme->getUrl('assets');
$CACHE = new \common\models\Cache();
$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->head() ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>管理中心 - <?php echo Option::get('blogname');?></title>
    <link href="<?= $assets?>/css/cssreset-min.css" rel="stylesheet">
    <link href="<?= $assets?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $assets?>/css/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $assets?>/css/css-main.css?v=<?php echo Option::EMLOG_VERSION; ?>" type=text/css rel=stylesheet>
    <script src="<?= $assets?>/libjs/jquery/jquery-1.11.0.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
    <script src="<?= $assets?>/libjs/jquery/plugin-cookie.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
    <script src="<?= $assets?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= $assets?>/js/common.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../" target="_blank" title="在新窗口浏站点">
                    <?php
                    $blog_name = Option::get('blogname');
                    echo empty($blog_name) ? '查看我的站点' : StringHelper::subString($blog_name, 0, 24);
                    ?>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="./"><i class="fa fa-home fa-fw"></i>管理首页</a></li>
                <li><a href="./configure.php"><i class="fa fa-wrench fa-fw"></i> 设置</a></li>
                <li><a href="./?action=logout"><i class="fa fa-power-off fa-fw"></i>退出</a></li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-avatar">
                            <div style="text-align: center;">
                                <a href="./blogger.php">
                                    <img class="img-circle" src="<?php echo empty($user_cache[UID]['avatar']) ? 'basic/assets/images/avatar.jpg' : '../' . $user_cache[UID]['avatar'] ?>" />
                                </a>
                            </div>
                        </li>
                        <li><a href="write_log.php" id="menu_wt"><i class="fa fa-edit fa-fw"></i> 写文章</a></li>
                        <li><a href="<?=Url::to(['log/index'])?>" id="menu_log"><i class="fa fa-list-alt fa-fw"></i> 文章</a></li>
                        <?php if (ROLE == ROLE_ADMIN || 1==1):?>
                            <li><a href="<?=Url::to(['tag/index'])?>" id="menu_tag"><i class="fa fa-tags fa-fw"></i> 标签</a></li>
                            <li><a href="<?=Url::to(['sort/index'])?>" id="menu_sort"><i class="fa fa-flag fa-fw"></i> 分类</a></li>
                        <?php endif;?>
                        <li><a href="comment.php" id="menu_cm"><i class="fa fa-comments fa-fw"></i> 评论
                                <?php
                                //$hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
                                //$n = $hidecmnum > 999 ? '...' : $hidecmnum;
                               // echo $n > 0 ? "({$n})" : '';
                                ?>
                            </a></li>
                        <?php if (ROLE == ROLE_ADMIN):?>
                            <li><a href="page.php" id="menu_page"><i class="fa fa-file-o fa-fw"></i> 页面</a></li>
                            <li><a href="link.php" id="menu_link"><i class="fa fa-link fa-fw"></i> 友链</a></li>
                            <li id="menu_category_view" class="">
                                <a href="#"><i class="fa fa-eye fa-fw"></i> 外观<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" id="menu_view">
                                    <li><a href="widgets.php" id="menu_widget"><i class="fa fa-columns fa-fw"></i> 侧边栏</a></li>
                                    <li><a href="navbar.php" id="menu_navi"><i class="fa fa-bars fa-fw"></i> 导航</a></li>
                                    <li><a href="template.php" id="menu_tpl"><i class="fa fa-eye fa-fw"></i> 模板</a></li>
                                </ul>
                            </li>
                            <li id="menu_category_sys" class="">
                                <a href="#"><i class="fa fa-cog fa-fw"></i> 系统<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" id="menu_sys">
                                    <li><a href="./configure.php" id="menu_setting"><i class="fa fa-wrench fa-fw"></i> 设置</a></li>
                                    <li><a href="user.php" id="menu_user"><i class="fa fa-user fa-fw"></i> 用户</a></li>
                                    <li><a href="data.php" id="menu_data"><i class="fa fa-database fa-fw"></i> 数据</a></li>
                                    <li><a href="plugin.php" id="menu_plug"><i class="fa fa-plug fa-fw"></i> 插件</a></li>
                                    <li><a href="store.php" id="menu_store"><i class="fa fa-shopping-cart fa-fw"></i> 应用</a></li>
                                </ul>
                            </li>
                            <?php if (!empty($emHooks['adm_sidebar_ext'])): ?>
                                <li id="menu_category_ext" class="">
                                    <a href="#"><i class="fa fa-puzzle-piece fa-fw"></i> 扩展功能<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level collapse" id="menu_ext">
                                        <li><?php doAction('adm_sidebar_ext'); ?></li>
                                    </ul>
                                </li>
                            <?php endif;?>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <?= $content ?>


<div id="footer"></div>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

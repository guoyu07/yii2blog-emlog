<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<div class="containertitle"><b>标签管理</b>
    <?php if(isset($_GET['active_del'])):?><span class="alert alert-success">删除标签成功</span><?php endif;?>
    <?php if(isset($_GET['active_edit'])):?><span class="alert alert-success">修改标签成功</span><?php endif;?>
    <?php if(isset($_GET['error_a'])):?><span class="alert alert-danger">请选择要删除的标签</span><?php endif;?>
    <?php if(isset($_GET['error_edit'])):?><span class="alert alert-danger">请选择要修改的标签</span><?php endif;?>
</div>
<div class=line></div>
<form action="<?=Url::to(['del'])?>" method="post" name="form_tag" id="form_tag">
    <div>
        <li>
            <?php
            if($tags):
            foreach($tags as $key=>$value): ?>
                <input type="checkbox" name="tids[]" class="ids" value="<?=$value['tid']; ?>" >
                <a href="<?=Url::to(['edit','tid'=>$value['tid']])?>"><?php echo $value['tagname']; ?></a> &nbsp;&nbsp;&nbsp;
            <?php endforeach; ?>
        </li>
        <li style="margin:20px 0px">
            <a href="javascript:void(0);" id="select_all">全选</a> 选中项：
            <a href="javascript:deltags();" class="care">删除</a>
        </li>
        <?php else:?>
            <li style="margin:20px 30px">还没有标签，写文章的时候可以给文章打标签</li>
        <?php endif;?>
    </div>
</form>
<script>
    selectAllToggle();
    function deltags(){
        if (getChecked('ids') == false) {
            alert('请选择要删除的标签');
            return;
        }
        if(!confirm('你确定要删除所选标签吗？')){return;}
        $("#form_tag").submit();
    }
    setTimeout(hideActived,2600);
    $("#menu_tag").addClass('active');
</script>

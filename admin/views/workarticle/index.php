<?php
 //$years=Yearlist::model()->findALL();
 //$terms=Term::model()->findALL();
 $years=base_year::model()->findALL();
 $stu=courseinfo::model()->findALL();
 $terms=base_term::model()->findALL();
 $tclass=get_session('class_teacher');
 set_school_resquest('school','stlevel','stclass','styear','sterm');
?>
<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table">材料审核进度查询</i></h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加</a>
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
        </div><!--box-header end-->

     <form action="<?php echo Yii::app()->request->url;?>" method="get">
    <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">

      <label style="margin-right:20px;">
        <span>学年</span>
        <select name="styear">
            <option value="<?php echo $model->cyear!="-1"?$model->cyear:base_year::model()->now(); ?>"><?php echo $model->cyear!="-1"?$model->cyear:base_year::model()->now();  ?></option>
            <?php foreach($years as $v){?>
                <?php if( $model->cyear==$v->F_NAME) continue; ?>
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_view;?></option>
            <?php }?>
        </select>
    </label>

    <label style="margin-right:20px;">
        <span>学期</span>
        <select name="sterm">
            <option value="<?php echo $model->cterm!="-1"?$model->cterm:base_year::model()->now(); ?>"><?php echo $model->cterm!="-1"?$model->cterm:base_year::model()->now(); ?></option>
            <?php foreach($terms as $v){?>
                <?php if($model->cterm==$v->F_NAME) continue;?>
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_SHOW;?></option>
            <?php }?>
        </select>
    </label>

    <?php $_SESSION["cyear"]=$model->cyear;
     $_SESSION["cterm"]=$model->cterm;?>
     
        <button class="btn btn-blue" type="submit">查询</button>
    </form>
</div><!--box-search end-->

<div class="box-table">
    <table class="list">
<thead>

    <tr>
        <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
        <th style='text-align: center;'>序号</th>
        <th style='text-align: center;'>课程编号</th>
        <th style='text-align: center;'>课程名称</th>
        <th style='text-align: center;'>作业序号</th>
        <th style='text-align: center;'>学生学号</th>
        <th style='text-align: center;'>学生姓名</th>
        <th style='text-align: center;'>教师打分</th>
        <th style='text-align: center;'>审核结果</th>
        <th style='text-align: center;'>操作</th>
    </tr>
</thead>
        <tbody>

<?php 
$index = 1;
foreach($arclist as $v){ 
?>
<tr>
    <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo CHtml::encode($v->id); ?>"></td>
    <td style='text-align: center;'><span class="num num-1"><?php echo $index ?></span></td>
    <td style='text-align: center;'><?php echo $v->ccourseid; ?></td>
    <td style='text-align: center;'><?php echo $v->ccoursename; ?></td>
    <td style='text-align: center;'><?php echo $v->cworkid; ?></td>
    <td style='text-align: center;'><?php echo $v->cstuid; ?></td>
    <td style='text-align: center;'><?php echo $v->cstuname; ?></td>
    <td style='text-align: center;'><?php echo $v->cscore; ?></td>
    <td style='text-align: center;'><?php echo $v->cstatus; ?></td>
    <td style='text-align: center;'>
     
        <a class="btn" href="<?php echo $this->createUrl('update', array('id'=>$v->id,'news_type'=>Yii::app()->request->getParam('news_type')));?>" title="编辑"><i class="fa fa-edit"></i></a>
        <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->id;?>', deleteUrl);" title="删除"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>
<?php $index++; } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        <div class="box-page c"><?php $this->page($pages);?></div>
    </div><!--box-content end-->
</div><!--box end-->

<script>
var deleteUrl = '<?php echo $this->createUrl('delete', array('id'=>'ID'));?>';

</script>
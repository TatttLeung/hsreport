
<?php
 $stu=cstuinfo::model()->findALL();
  $years=base_year::model()->findALL();
 //$stu=teainfo::model()->findALL();
 $terms=base_term::model()->findALL();
?>
<<<<<<< HEAD


=======
>>>>>>> 0f395328a68d62640194328c33a193c847640f7f
<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table"></i>课程学生信息</h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
        </div><!--box-header end-->

     <form action="<?php echo Yii::app()->request->url;?>" method="get">
    <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">

    <label style="margin-right:20px;">
        <span>学年</span>
        <select name="styear">
            <option value="<?php echo $model->courseyear!="-1"?$model->courseyear:base_year::model()->now(); ?>"><?php echo $model->courseyear!="-1"?$model->courseyear:base_year::model()->now(); ?></option>
            <?php foreach($years as $v){?>
                <?php if($model->courseyear==$v->F_NAME) continue;?>
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_view;?></option>
            <?php }?>
        </select>
    </label>
    
    <label style="margin-right:20px;">
        <span>学期</span>
        <select name="sterm">
            <option value="<?php echo $model->courseterm!="-1"?$model->courseterm:base_year::model()->now(); ?>"><?php echo $model->courseterm!="-1"?$model->courseterm:base_year::model()->now(); ?></option>
            <?php foreach($terms as $v){?>
<<<<<<< HEAD
                <?php if($model->courseterm==$v->F_NAME) continue;?>
=======
                <?php if($model->cterm==$v->F_NAME) continue;?>
>>>>>>> 0f395328a68d62640194328c33a193c847640f7f
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_SHOW;?></option>
            <?php }?>
        </select>
    </label>

     
        <button class="btn btn-blue" type="submit">查询</button>
<<<<<<< HEAD
        

=======

        <button class="btn btn-blue" >查询</button>
>>>>>>> 0f395328a68d62640194328c33a193c847640f7f
    </form>
</div><!--box-search end-->

<div class="box-table">
    <table class="list">
<thead>

    <tr>
        <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
        <th style='text-align: center;'>序号</th>
        <th style='text-align: center;'>学年</th>
        <th style='text-align: center;'>学期</th>
        <th style='text-align: center;'>课程编码</th>
        <th style='text-align: center;'>课程名称</th>
        <th style='text-align: center;'>作业序号</th>
        <th style='text-align: center;'>学生姓名</th>
        <th style='text-align: center;'>学号</th>        
        <th style='text-align: center;'>作业分数</th>
        <th style='text-align: center;'>审核状态</th>
        <th style='text-align: center;'>审核意见</th>
        <th style='text-align: center;'>审核时间</th>                
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
<<<<<<< HEAD
    <td style='text-align: center;'><?php echo $v->courseid; ?></td>
    <td style='text-align: center;'><?php echo $v->coursename; ?></td>
    <td style='text-align: center;'><?php echo $v->courseteacher; ?></td>  
    <td style='text-align: center;'><?php echo $v->stuname; ?></td>
    <td style='text-align: center;'><?php echo $v->stuid; ?></td>
    <td style='text-align: center;'><?php echo $v->stuscore; ?></td>
=======
   <td style='text-align: center;'><?php echo $v->cyear; ?></td>
   <td style='text-align: center;'><?php echo $v->cterm; ?></td>
    <td style='text-align: center;'><?php echo $v->ccourseid; ?></td>
    <td style='text-align: center;'><?php echo $v->ccoursename; ?></td>
    <td style='text-align: center;'><?php echo $v->cworkid; ?></td>  
    <td style='text-align: center;'><?php echo $v->cstuname; ?></td>
    <td style='text-align: center;'><?php echo $v->cstuid; ?></td>
    <td style='text-align: center;'><?php echo $v->cscore; ?></td>
    <td style='text-align: center;'><?php echo $v->cstatus; ?></td>    
    <td style='text-align: center;'><?php echo $v->copinion; ?></td>
    <td style='text-align: center;'><?php echo $v->ctime; ?></td>    
>>>>>>> 0f395328a68d62640194328c33a193c847640f7f
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
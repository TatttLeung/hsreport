<?php
 $stu=cstuinfo::model()->findALL();
  $years=base_year::model()->findALL();
 //$stu=teainfo::model()->findALL();
 $terms=base_term::model()->findALL();
 $courses=courseinfo::model()->findALL();
?>


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
                <?php if($model->courseterm==$v->F_NAME) continue;?>
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_SHOW;?></option>
            <?php }?>
        </select>
    </label>

    <label style="margin-right:20px;">
        <span>课程名称</span>
        <select name="scoursename">
            <option value="<?php echo $model->coursename; ?>"><?php echo $model->coursename; ?></option>
            <?php foreach($courses as $v){?>
                <?php if($model->coursename==$v->coursename) continue;?>
            <option value="<?php echo $v->coursename;?>"><?php echo $v->coursename;?></option>
            <?php }?>
        </select>
    </label>
     
        <button class="btn btn-blue" type="submit">查询</button>
        

    </form>
</div><!--box-search end-->


<div class="box-table">
    <table class="list">
<thead>

    <tr>
        <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
        <th style='text-align: center;'>序号</th>
        <th style='text-align: center;'>课程编码</th>
        <th style='text-align: center;'>课程名称</th>
        <th style='text-align: center;'>任课老师</th>
        <th style='text-align: center;'>学生姓名</th>
        <th style='text-align: center;'>学号</th>        
        <th style='text-align: center;'>作业分数</th>               
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
    <td style='text-align: center;'><?php echo $v->courseid; ?></td>
    <td style='text-align: center;'><?php echo $v->coursename; ?></td>
    <td style='text-align: center;'><?php echo $v->courseteacher; ?></td>  
    <td style='text-align: center;'><?php echo $v->stuname; ?></td>
    <td style='text-align: center;'><?php echo $v->stuid; ?></td>
    <td style='text-align: center;'><?php echo $v->stuscore; ?></td>
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
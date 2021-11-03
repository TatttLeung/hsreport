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
     <div class="box-title c"><h1><i class="fa fa-table"></i>教师任课信息</h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
        </div><!--box-header end-->

     <form action="<?php echo Yii::app()->request->url;?>" method="get">
    <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">

      <label style="margin-right:20px;">
        <span>学年</span>
        <select name="styear">
            <option value="">请选择</option>
            <?php foreach($stu as $v){?>
            <option value="<?php echo $v->courseyear;?>"><?php echo $v->courseyear;?></option>
            <?php }?>
        </select>
    </label>
    <label style="margin-right:20px;">
        <span>学期</span>
        <select name="sterm">
            <option value="">请选择</option>
            <?php foreach($stu as $v){?>
            <option value="<?php echo $v->courseterm;?>"><?php echo $v->courseterm;?></option>
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
        <th style='text-align: center;'>学年</th>
        <th style='text-align: center;'>学期</th>
        <th style='text-align: center;'>教师姓名</th>
        <th style='text-align: center;'>所教课程</th>
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
   <td style='text-align: center;'><?php echo $v->courseyear; ?></td>
   <td style='text-align: center;'><?php echo $v->courseterm; ?></td>
    <td style='text-align: center;'><?php echo $v->courseteacher; ?></td>
    <td style='text-align: center;'><?php echo $v->coursename; ?></td>
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
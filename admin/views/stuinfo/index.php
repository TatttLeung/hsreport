<?php
 $stu=stuinfo::model()->findALL();
 $stgrade=base_grade::model()->findALL();
 $stsubject=base_subject::model()->findALL();
?>
<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table"></i>学生信息列表</h1></div><!--box-title end-->
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
        <select name="stgrade">
            <option value="">请选择</option>
            <?php foreach($stgrade as $v){?>
            <option value="<?php echo $v->grade;?>"><?php echo $v->grade;?></option>
            <?php }?>
        </select>
    </label>
    <label style="margin-right:20px;">
        <span>专业</span>
        <select name="stsubject">
            <option value="">请选择</option>
            <?php foreach($stsubject as $v){?>
            <option value="<?php echo $v->subject;?>"><?php echo $v->subject;?></option>
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
        <th style='text-align: center;'>学号</th>
        <th style='text-align: center;'>姓名</th>
        <th style='text-align: center;'>性别</th>
        <th style='text-align: center;'>年级</th>
        <th style='text-align: center;'>专业</th>
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
   <td style='text-align: center;'><?php echo $v->stuid; ?></td>
   <td style='text-align: center;'><?php echo $v->stuname; ?></td>
    <td style='text-align: center;'><?php echo $v->stusex; ?></td>
    <td style='text-align: center;'><?php echo $v->stugrade; ?></td>
    <td style='text-align: center;'><?php echo $v->stumajor; ?></td>
    <td style='text-align: center;'>
     
        <a class="btn" href="<?php echo $this->createUrl('update', array('id'=>$v->id));?>" title="编辑"><i class="fa fa-edit"></i></a>
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

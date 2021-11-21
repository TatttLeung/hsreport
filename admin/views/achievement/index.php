<?php
$years=base_year::model()->findALL();
$courses=Projectcommit::model()->findALL();
?>


<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table"></i>完成度</h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
        </div><!--box-header end-->

     <form action="<?php echo Yii::app()->request->url;?>" method="get">
    <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">


    <label style="margin-right:10px;">
        <span>课程或教师关键字查询：</span>
        <input style="width:200px;" class="input-text" type="text" name="keywords" value="<?php echo Yii::app()->request->getParam('keywords');?>">
    </label>

        <button class="btn btn-blue" type="submit">查询</button>
        
    </form>
</div><!--box-search end-->

<div class="box-table">
<div class="box-table">
    <table class="list">
<thead>

    <tr>
        <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
        <th style='text-align: center;'>序号</th>
        <th style='text-align: center;'>学年</th>      
        <th style='text-align: center;'>学期</th> 
        <th style='text-align: center;'>课程</th>
        <th style='text-align: center;'>学分</th>
        <th style='text-align: center;'>教师</th>       
        <th style='text-align: center;'>课程性质</th>   
        <th style='text-align: center;'>任务完成人</th> 
        <th style='text-align: center;'>任务说明</th>
        <th style='text-align: center;'>附件</th>
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
    <td style='text-align: center;'><?php echo $v->courseyear; ?></td>
    <td style='text-align: center;'><?php echo $v->courseterm; ?></td>
    <td style='text-align: center;'><?php echo $v->coursename; ?></td>
    <td style='text-align: center;'><?php echo $v->coursescore; ?></td>
    <td style='text-align: center;'><?php echo $v->courseteacher; ?></td>
    <td style='text-align: center;'><?php echo $v->coursetype; ?></td>
    <td style='text-align: center;'><?php echo $v->courseleader; ?></td>
    <td style='text-align: center;'><?php echo $v->explain; ?></td>
    <td style='text-align: center;'><?php echo BaseLib::model()->show_pic($v->file);?></td>
    <td style='text-align: center;'>
    <a class="btn" href="<?php echo $this->createUrl('update', array('id'=>$v->id,));?>" title="编辑"><i class="fa fa-edit"></i></a>
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

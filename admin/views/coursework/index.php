<?php
 $cw=coursework::model()->findALL();
 $terms=base_term::model()->findALL();
  $years=base_year::model()->findALL();
?>
<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table"></i>课程作业信息列表</h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
        </div><!--box-header end-->

     <form action="<?php echo Yii::app()->request->url;?>" method="get">
    <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">

      <label style="margin-right:20px;">
        <span>学年</span>
        <select name="styear">
            <option value="">请选择</option>
            <?php foreach($years as $v){?>
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_NAME;?></option>
            <?php }?>
        </select>
    </label>
    <label style="margin-right:20px;">
        <span>学期</span>
        <select name="sterm">
            <option value="">请选择</option>
            <?php foreach($terms as $v){?>
            <option value="<?php echo $v->F_NAME;?>"><?php echo $v->F_NAME;?></option>
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
        <th style='text-align: center;'>学年</th>
        <th style='text-align: center;'>学期</th>
        <th style='text-align: center;'>课程编码</th>
        <th style='text-align: center;'>绑定课程</th>
        <th style='text-align: center;'>执教老师</th>
        <th style='text-align: center;'>作业类型</th>
        <th style='text-align: center;'>作业序号</th>
        <th style='text-align: center;'>作业名称</th>        
        <th style='text-align: center;'>开始提交时间</th>
        <th style='text-align: center;'>提交结束时间</th>
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
   <td style='text-align: center;'><?php echo $v->workyear; ?></td>
   <td style='text-align: center;'><?php echo $v->workterm; ?></td>
   <td style='text-align: center;'><?php echo $v->workcourseid; ?></td>
   <td style='text-align: center;'><?php echo $v->workcourse; ?></td>
   <td style='text-align: center;'><?php echo $v->workteacher; ?></td>
   <td style='text-align: center;'><?php echo $v->worktype; ?></td>
    <td style='text-align: center;'><?php echo $v->workid; ?></td>
    <td style='text-align: center;'><?php echo $v->workname; ?></td>    
    <td style='text-align: center;'><?php echo $v->workstart; ?></td>
    <td style='text-align: center;'><?php echo $v->workend; ?></td>
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

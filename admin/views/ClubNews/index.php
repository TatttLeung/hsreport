<?php if (!isset($_REQUEST['news_type'])) {$_REQUEST['news_type']=0;} ?>
<?php
 $school=schoolList::model()->find(); 
 $years=Yearlist::model()->findALL();
 $terms=Term::model()->findALL();
 $class=User::model()->find();
 $tclass=get_session('class_teacher');
 set_school_resquest('school','stlevel','stclass','styear','sterm');
?>
<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table"></i>活动列表</h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加</a>
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
        </div><!--box-header end-->

     <form action="<?php echo Yii::app()->request->url;?>" method="get">
    <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">
    <input type="hidden" name="school" id="school" value="<?php echo $school->school_name;?>">
    <input type="hidden" name="news_type" id="news_type" value="<?php echo $_REQUEST['news_type'];?>">

      <label style="margin-right:20px;">
        <span>学年</span>
        <select name="styear">
            <option value="">请选择</option>
            <?php foreach($years as $v){?>
            <option value="<?php echo $v->F_NAME;?>"<?php if($_REQUEST['styear'] ==$v->F_NAME){?> selected<?php }?>><?php echo $v->F_NAME;?></option>
            <?php }?>
        </select>
    </label>
    <label style="margin-right:20px;">
        <span>学段</span>
        <select name="sterm">
            <option value="">请选择</option>
            <?php foreach($terms as $v){?>
            <option value="<?php echo $v->F_value;?>"<?php if($_REQUEST['sterm']==$v->F_value){?> selected<?php }?>><?php echo $v->F_NAME;?></option>
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
        <th style='text-align: center;'>编号</th>
        <th style='text-align: center;'>活动主题</th>
        <th style='text-align: center;'>举办机构</th>
        <th style='text-align: center;'>报名/需求数</th>
        <th style='text-align: center;'><?php echo $model->getAttributeLabel('sign_date_start');?>
        <th style='text-align: center;'><?php echo $model->getAttributeLabel('sign_date_end');?>
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
   <td style='text-align: center;'><?php echo $v->news_title; ?></td>
   <td style='text-align: center;'><?php echo $v->news_club_name; ?></td>
    <td style='text-align: center;'><?php echo $v->sign_num.'/'.$v->sign_max; ?></td>
    <td style='text-align: center;'><?php echo $v->sign_date_start; ?></td>
    <td style='text-align: center;'><?php echo $v->sign_date_end; ?></td>
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

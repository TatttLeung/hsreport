<?php 
if (!isset($_REQUEST['club_news_id'])) {$_REQUEST['club_news_id']=0;}
// $school=School::model()->find(); 
 $years=base_year::model()->findALL();
 $terms=base_term::model()->findALL();
 //$levels=Level::model()->findALL();
 //$class=BaseCode::model()->getClass();
 //$tclass=get_session('class_teacher');
 set_school_resquest('school','level','sclass','scyear','term');
 $club_news= ClubNews::model()->getClubnews();
?>
<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>活動報名名單</h1></div><!--box-title end-->
    <div class="box-content">
    <div class="box-header">
        <a class="btn" href="<?php echo $this->createUrl('create',array('club_news_id' => $_REQUEST['club_news_id']));?>">
        <i class="fa fa-plus"></i>添加</a>
        <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
        <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
    </div><!--box-header end-->
    <div class="box-search">
        <form action="<?php echo Yii::app()->request->url;?>" method="get">
        <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">
        <input type="hidden" name="club_news_id" value="<?php echo $_REQUEST['club_news_id'];?>">
         <label style="margin-right:20px;">
        <span>學年:</span>
        <select name="scyear">
            <option value="">請選擇</option>
            <?php foreach($years as $v){?>
            <option value="<?php echo $v->F_value;?>"<?php if(Yii::app()->request->getParam('scyear')==$v->F_value){?> selected<?php }?>><?php echo $v->F_NAME;?></option>
            <?php }?>
        </select>
    </label>
    <label style="margin-right:20px;">
        <span>學段:</span>
        <select name="term">
            <option value="">請選擇</option>
            <?php foreach($terms as $v){?>
            <option value="<?php echo $v->F_value;?>"<?php if(Yii::app()->request->getParam('term')==$v->F_value){?> selected<?php }?>><?php echo $v->F_NAME;?></option>
            <?php }?>
        </select>
      </label>
     <label style="margin-right:20px;">
        <span>活動名稱:</span>
        <select name="club_news_id">
            <option value="">請選擇</option>
            <?php foreach($club_news as $v){?>
            <option value="<?php echo $v->id;?>"<?php if(Yii::app()->request->getParam('club_news_id')==$v->id){?> selected<?php }?>><?php echo $v->news_title;?></option>
            <?php }?>
        </select>
      </label>
        <label style="margin-right:10px;">
            <span>關鍵字：</span>
            <input style="width:200px;" class="input-text" type="text" name="keywords" value="<?php echo Yii::app()->request->getParam('keywords');?>">
        </label>
        <button class="btn btn-blue" type="submit">查詢</button>
     <input type="hidden" id="oper" name="oper" value="1212123">
    <button class="btn btn-blue" onclick="$('#oper').val('excel');" type="submit">導出名單</button>
    <a href='<?php echo $xls;?>' ><?php echo $xls ?"點擊下載導出的名單" : ""; ?></a>

        </form>
    </div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
                        <th class="list-id">序號</th>
                        <th><?php echo $model->getAttributeLabel('f_level');?></th>
                        <th><?php echo $model->getAttributeLabel('f_class');?></th>
                        <th><?php echo $model->getAttributeLabel('scsnum');?></th>
                        <th><?php echo $model->getAttributeLabel('stname');?></th>
                          <th><?php echo $model->getAttributeLabel('club_title');?></th>
                        <th><?php echo $model->getAttributeLabel('f_chosedate');?></th>
                             <th style='text-align: center;'>電話</th>
          <th style='text-align: center;'>出生日期</th>  
          <th style='text-align: center;'>身份證</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
<?php
$index = 1;
 foreach($arclist as $v){ 
    $stm= Student::model()->find("stsnum=".$v->stsnum);
    $t1="";$t2="";$t3="";
    if (!empty($stm)){
       $t1=$stm->STMOBILE;$t2=$stm->STBORND;$t3=$stm->STIDN;
        
    }
?>
                    <tr>
                        <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo CHtml::encode($v->id); ?>"></td>
                        <td><span class="num num-1"><?php echo $index ?></span></td>
                        <td><?php echo $v->f_level; ?></td>
                        <td><?php echo $v->f_class; ?></td>
                        <td><?php echo $v->scsnum; ?></td>
                        <td><?php echo $v->stname; ?></a></td>
                        <td><?php echo $v->club_title; ?></a></td>
                        <td><?php echo $v->f_chosedate; ?></td>
                        <td><?php echo $t1; ?></td>
                        <td><?php echo $t2; ?></td>
                        <td><?php echo $t3; ?></td>
                        <td>
                             <a class="btn" href="<?php echo $this->createUrl('update', array('id'=>$v->id));?>" title="編輯"><i class="fa fa-edit"></i></a>
                            <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->id;?>', deleteUrl);" title="刪除"><i class="fa fa-trash-o"></i></a>
                        </td>
                        </td>
                    </tr>
<?php $index++; } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        
        <div class="box-page c"><?php $this->page($pages); ?></div>
    </div><!--box-content end-->
</div><!--box end-->
<script>
var deleteUrl = '<?php echo $this->createUrl('delete', array('id'=>'ID'));?>';
</script>

   <?php
    if (isset( $_REQUEST['club_news_id'] ) ) {
       $model->club_news_id=$_REQUEST['club_news_id'];//角色類型
       $model->f_chose=1; 

    }
     $club_news= ClubNews::model()->getClubnews(); 
    ?>
<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>活動報名</h1><span class="back">   
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
        <div style="display:block;" class="box-detail-tab-item">
            <table class="mt15">
                 <tr><td width="10%"><?php echo $form->labelEx($model, 'stsnum'); ?></td>
                    <td width="90%">
                     <?php echo $form->textField($model, 'stsnum', array('class' => 'input-text','readonly'=>'ture')); ?>
                        <input id="club_select_btn" class="btn" type="button" value="選擇">
                        <?php echo $form->error($model, 'stsnum', $htmlOptions = array()); ?>
                    </td>
                </tr>
                <tr>
                <td ><?php echo $form->labelEx($model, 'stname'); ?></td>
                <td ><?php echo $form->textField($model, 'stname', array('class' => 'input-text','readonly'=>'ture')); ?>
                    <?php echo $form->error($model, 'stname', $htmlOptions = array()); ?></td>
                </tr>
                
                <tr>
                        <td style="padding:10px;">活動名稱</td>
                        <td>
<?php echo $form->dropDownList($model, 'club_news_id', Chtml::listData(ClubNews::model()->getClubnews(), 'id', 'news_title'),  array('prompt'=>'请选择','onchange' =>'selectOnchang(this)')); $arr=BaseCode::model()->getClub_type2(); ?>
  <?php echo $form->error($model, 'club_news_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>
            </table>
        </div><!--box-detail-tab-item end-->
        </div><!--box-detail-bd end-->
        <div class="box-detail-submit">
        <?php echo $form->hiddenField($model, 'club_news_id'); ?>
         <?php echo $form->hiddenField($model, 'f_chose'); ?>
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
<?php $this->endWidget();?>

</div>
</div>
<script>

$('#ClubNewsSignList_f_chosedate').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});

$('#club_select_btn').on('click', function(){ read_person(); });
    
 function read_person(){
        $.dialog.data('service_person_id', 0);
        $.dialog.open('<?php echo $this->createUrl("select/Gfuser");?>',{
            id:'fuwuzhe',lock:true,opacity:0.3,width:'500px',height:'60%',
            title:'選擇具體內容',
            close: function () {
            if($.dialog.data('stsnum')>0){
               $('#ClubNewsSignList_stsnum').val($.dialog.data('stsnum'));
               $('#ClubNewsSignList_stname').val($.dialog.data('stname'));
            }
        }
    });    
  }
 </script>
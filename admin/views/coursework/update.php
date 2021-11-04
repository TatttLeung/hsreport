<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>课程作业信息详情</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'workyear'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'workyear', Chtml::listData(base_year::model()->findALL(),'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'workyear', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'workterm'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'workterm', Chtml::listData(base_term::model()->findALL(),'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'workterm', $htmlOptions = array()); ?>
                        </td>
                      </tr>
                         <tr>
                        <td ><?php echo $form->labelEx($model, 'workid'); ?></td>
                        <td >
                             <?php echo $form->dropDownList($model, 'workid', Chtml::listData(base_num::model()->findALL(),'number', 'number'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'workid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td ><?php echo $form->labelEx($model, 'workname'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'workname', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'workname', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'workcourse'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'workcourse', Chtml::listData(courseinfo::model()->findALL(),'coursename', 'coursename'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'workcourse', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'workstart'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'workstart', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'workstart', $htmlOptions = array()); ?>
                        </td>
                         </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'workend'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'workend', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'workend', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                </table>
        </div>
        <div class="box-detail-submit">
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
         
    
            <?php $this->endWidget();?>
  </div><!--box-detail end-->
</div><!--box end-->
 
 <script>
we.tab('.box-detail-tab li','.box-detail-tab-item');
var coursework=0;
$('#coursework_workstart').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});

$('#coursework_workend').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});
  
    // 选择课程
    var $course_box=$('#course_box');
    var $coursework_course_id=$('#coursework_course_id');
    $('#course_select_btn').on('click', function(){
        $.dialog.data('coursework', 0);
        $.dialog.open('<?php echo $this->createUrl("select/coursework", array('partnership_type'=>16));?>',{
            id:'danwei',
            lock:true,
            opacity:0.3,
            title:'选择具体内容',
            width:'500px',
            height:'60%',
            close: function () {
                //console.log($.dialog.data('club_id'));
                if($.dialog.data('coursework')>0){
                    coursework=$.dialog.data('coursework');
                    $coursework_course_id.val($.dialog.data('coursework')).trigger('blur');
                    $course_box.html('<span class="label-box">'+$.dialog.data('coursework')+'</span>');
                }
            }
        });
    });
</script> 

   
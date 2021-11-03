<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>教师信息详情</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                     <tr>
                        <td ><?php echo $form->labelEx($model, 'cyear'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'cyear', Chtml::listData(base_year::model()->findALL(), 'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'cyear', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cterm'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'cterm', Chtml::listData(base_term::model()->findALL(), 'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'cterm', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td><?php echo $form->labelEx($model, 'cstuid'); ?></td>
                        <td>
                          <?php echo $form->textField($model,'cstuid', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'cstuid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td><?php echo $form->labelEx($model, 'cstuname'); ?></td>
                        <td>
                          <?php echo $form->textField($model,'cstuname', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'cstuname', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'ccoursename'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'ccoursename', Chtml::listData(courseinfo::model()->findALL(), 'coursename', 'coursename'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'ccoursename', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'cworkid'); ?></td>
                        <td>
                          <?php echo $form->textField($model,'cworkid', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'cworkid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'cscore'); ?></td>
                        <td>
                          <?php echo $form->textField($model,'cscore', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'cscore', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                </table>
            </div><!--box-detail-tab-item end-->
        </div><!--box-detail-bd end-->

        <div class="box-detail-submit">
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">确认分数</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
         
    
        <?php $this->endWidget();?>

</script> 
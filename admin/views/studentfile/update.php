<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>学生信息详情</h1><span class="back">
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
                            <?php echo $form->textField($model, 'cyear', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cyear', $htmlOptions = array()); ?>
                        </td>
                      </tr>
                         <tr>
                        <td ><?php echo $form->labelEx($model, 'cterm'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'cterm', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cterm', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cstuid'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'cstuid', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cstuid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cstuname'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'cstuname', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cstuname', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'ccoursename'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'ccoursename', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'ccoursename', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cworkid'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'cworkid', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cworkid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cpath'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'cpath', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cpath', $htmlOptions = array()); ?>
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
 
   
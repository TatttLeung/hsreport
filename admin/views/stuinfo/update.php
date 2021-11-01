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
                        <td ><?php echo $form->labelEx($model, 'stuid'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'stuid', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'stuid', $htmlOptions = array()); ?>
                        </td>
                      </tr>
                         <tr>
                        <td ><?php echo $form->labelEx($model, 'stuname'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'stuname', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'stuname', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td ><?php echo $form->labelEx($model, 'stusex'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'stusex', Chtml::listData(base_sex::model()->findALL(),'sexname', 'sexname'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'stusex', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'stugrade'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'stugrade', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'stugrade', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'stumajor'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'stumajor', Chtml::listData(major::model()->findALL(), 'majorname', 'majorname'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'stumajor', $htmlOptions = array()); ?>
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
 
   
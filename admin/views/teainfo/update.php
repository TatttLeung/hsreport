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
                        <td ><?php echo $form->labelEx($model, 'teaname'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'teaname', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'teaname', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                                     <tr>
                        <td ><?php echo $form->labelEx($model, 'teasex'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'teasex', Chtml::listData(base_sex::model()->findALL(),'sexname', 'sexname'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'teasex', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td><?php echo $form->labelEx($model, 'teadep'); ?></td>
                        <td>
                          <?php echo $form->textField($model,'teadep', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'teadep', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td><?php echo $form->labelEx($model, 'tealevel'); ?></td>
                        <td>
                          <?php echo $form->textField($model,'tealevel', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'tealevel', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                </table>
            </div><!--box-detail-tab-item end-->
        </div><!--box-detail-bd end-->

        <div class="box-detail-submit">
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存</button>
          <button onclick="submitType='shenhe'" class="btn btn-blue" type="submit">提交审核</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
         
    
        <?php $this->endWidget();?>

</script> 
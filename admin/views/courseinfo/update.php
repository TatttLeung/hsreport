<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>课程信息设置详情</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'courseyear'); ?></td>
                        <td >
                <?php echo $form->dropDownList($model, 'courseyear', Chtml::listData(base_year::model()->findALL(), 'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                <?php echo $form->error($model, 'courseyear', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'courseterm'); ?></td>
                        <td >
                <?php echo $form->dropDownList($model, 'courseterm', Chtml::listData(base_term::model()->findALL(), 'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                <?php echo $form->error($model, 'courseterm', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'courseid'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'courseid', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'courseid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'coursename'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'coursename', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'coursename', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td ><?php echo $form->labelEx($model, 'coursetime'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'coursetime', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'coursetime', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td ><?php echo $form->labelEx($model, 'courseteacher'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'courseteacher', Chtml::listData(teainfo::model()->findALL(),'teaname', 'teaname'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'courseteacher', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'reportcnt'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'reportcnt', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'reportcnt', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'homeworkcnt'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'homeworkcnt', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'homeworkcnt', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'examcnt'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'examcnt', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'examcnt', $htmlOptions = array()); ?>
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
 
   
<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>学生提交信息详情</h1><span class="back">
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
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cterm'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'cterm', Chtml::listData(base_term::model()->findALL(), 'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'cterm', $htmlOptions = array()); ?>
                        </td>
                    </tr>
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
                            <?php echo $form->dropDownList($model, 'ccoursename', Chtml::listData(courseinfo::model()->findALL(), 'coursename', 'coursename'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'ccoursename', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cworkid'); ?></td>
                        <td >
                             <?php 
/*
                             $dn=5;
                             if(!empty($model->cworkid)) $dn=$model->cworkid;*/
                             $t = base_num::model()->findALL("number<=5");
                             echo $form->dropDownList($model, 'cworkid', Chtml::listData($t,'number', 'number'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'cworkid', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                     <tr>
                         <td><?php echo $form->labelEx($model, 'cpath'); ?></td>
                        <td>
                            <?php echo $form->hiddenField($model, 'cpath', array('class' => 'input-text fl')); ?>
                            <!-- 改缩略图这里要改 -->
                            <!-- face_game_bigpic -->
                            <?php /*$basepath=BasePath::model()->getPath();*/
                            $picprefix='';
                            //$model->news_pic='t1234.jpg';
                            //if($basepath){ $picprefix=$basepath; }?>
                         <div class="upload_img fl" id="upload_pic_studentfile_cpath"> 
                          <?php if(!empty($model->cpath)) {?>
                             <a href="<?php echo $model->cpath?>" target="_blank">
                             <img src="<?php if (substr($model->cpath,-3,3)=='pdf') 
                             echo '/hsreport/uploads/image/pdf.png';
                                else if(substr($model->cpath,-4,4)=='docx')
                                echo '/hsreport/uploads/image/WORD.png';?>", width="50">
                             </a>
                             <?php }?>
                             </div>
                            <script>we.uploadpic('<?php echo get_class($model);?>_cpath','<?php echo $picprefix;?>','','','',0);</script>
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
 
   
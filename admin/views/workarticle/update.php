<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>教务员审核</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                
                        <td ><?php echo $form->labelEx($model, 'ctime'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'ctime', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'ctime', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'cstatus'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'cstatus', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'cstatus', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'copinion'); ?></td>
                        <td >
                            <?php echo $form->textArea($model, 'copinion', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'copinion', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <?php $picprefix='';?>
                            <?put_msg($picprefix);?>
                         <div class="upload_img fl" id="upload_pic_ClubNews_cpath"> 
                          <?php if(!empty($model->news_pic)) {?>
                             <a href="<?php echo $model->cpath;?>" target="_blank">
                             <img src="<?php echo $model->cpath;?>" width="100">
                             </a>
                             <?php }?>
                             
                            <script>we.uploadpic('<?php echo get_class($model);?>_cpath','<?php echo $picprefix;?>','','','',0);</script>
                            <?php echo $form->error($model, 'cpath', $htmlOptions = array()); ?></div>
                        </td>
                    </tr>

                </table>
        </div>
        <div class="box-detail-submit">
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存审核</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
         
    
            <?php $this->endWidget();?>
  </div><!--box-detail end-->
</div><!--box end-->
 
   
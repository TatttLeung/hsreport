<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>完成度</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'explain'); ?></td>
                        <td >
                            <?php echo $form->textArea($model, 'explain',array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'explain', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                     <tr>

                         <td><?php echo $form->labelEx($model, 'file'); ?></td>
                        <td>
                            <?php echo $form->hiddenField($model, 'file', array('class' => 'input-text fl')); ?>
                            <div>只能上传 doc docx pdf zip rar 格式文件</div>
                            <!-- 改缩略图这里要改 -->
                            <!-- face_game_bigpic -->
                            <?php /*$basepath=BasePath::model()->getPath();*/
                            $picprefix='';
                            //$model->news_pic='t1234.jpg';
                            //if($basepath){ $picprefix=$basepath; }?>
                         <div class="upload_img fl" id="upload_pic_achievement_file"> 
                          <?php if(!empty($model->file)) {?>
                             <a href="<?php  if(substr($model->file,-3,3)=='pdf' || substr($model->file,-4,4)=='docx' || substr($model->file,-3,3)=='doc' || substr($model->file,-3,3)=='zip' || substr($model->file,-3,3)=='rar')
                                     echo $model->file;
                              else
                                     echo   'https://z3.ax1x.com/2021/11/06/IMh0XT.png'; ?>" target="_blank">
                             <img src="<?php if (substr($model->file,-3,3)=='pdf') 
                                echo '/hsreport/uploads/image/pdf.png';
                                else if(substr($model->file,-4,4)=='docx')
                                echo '/hsreport/uploads/image/WORD.png';
                                else if(substr($model->file,-3,3)=='doc')
                                echo '/hsreport/uploads/image/WORD.png';
                                else if(substr($model->file,-3,3)=='zip')
                                echo '/hsreport/uploads/image/zip.png';
                                else if(substr($model->file,-3,3)=='rar')
                                echo '/hsreport/uploads/image/rar.png';
                                else 
                                echo '/hsreport/uploads/image/fail.png';
                                ?>", width="50">
                             </a>
                             <?php }?>
                             </div>
                            <script>we.uploadpic('<?php echo get_class($model);?>_file','<?php echo $picprefix;?>','','','',0);</script>
                            <?php echo $form->error($model, 'file', $htmlOptions = array()); ?>
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
 
   
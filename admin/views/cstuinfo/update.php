<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>学生信息导入页面</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                     <tr>

                         <td><?php echo "文件上传"; ?></td>
                        <td>
                            <?php echo $form->hiddenField($model, 'excelPath', array('class' => 'input-text fl')); ?>
                            <div>只能上传 xlsx xls 格式文件</div>
                            <!-- 改缩略图这里要改 -->
                            <!-- face_game_bigpic -->
                            <?php /*$basepath=BasePath::model()->getPath();*/
                            $picprefix='';
                            //$model->news_pic='t1234.jpg';
                            //if($basepath){ $picprefix=$basepath; }?>
                         <div class="upload_img fl" id="upload_pic_cstuifo_excelPath"> 
                             </div>
                            <script>we.uploadpic('<?php echo get_class($model);?>_excelPath','<?php echo $picprefix;?>','','','',0);</script>
                            <?php echo $form->error($model, 'excelPath', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                </table>
        </div>
        <div class="box-detail-submit">
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">导入</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
         
    
            <?php $this->endWidget();?>
  </div><!--box-detail end-->
</div><!--box end-->
 
   
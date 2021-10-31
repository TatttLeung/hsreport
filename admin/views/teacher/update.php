<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>编辑</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-content">
        <div class="show_menu">教师或机构人员基本信息</div>
        <div class="box-table">
            <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
            <table border="1" cellspacing="1" cellpadding="0" class="product_publish_content" style="width:100%;margin-bottom:10px;">
            
                    <tr style="text-align:center;"> 
                        <td style="padding:15px;" width="15%"><?php echo $form->labelEx($model, 'TCOD'); ?></td> 
                         <td width="35%" id="TCOD"><?php echo $form->textField($model, 'TCOD', array('class' => 'input-text')); ?></td> 
                            <?php echo $form->error($model, 'TCOD', $htmlOptions = array()); ?>
                        <td style="padding:15px;"  width="15%"><?php echo $form->labelEx($model, 'TCNAME'); ?></td>
                        <td width="35%" id="TCNAME"><?php echo $form->textField($model, 'TCNAME', array('class' => 'input-text')); ?></td> 
                           <?php echo $form->error($model, 'CLUB_ID', $htmlOptions = array()); ?>
                    </tr>
                    <tr style="text-align:center;"> 
                        <td style="padding:15px;" width="15%"><?php echo $form->labelEx($model, 'TMOB'); ?></td> 
                        <td width="35%" id="TMOB" ><?php echo $form->textField($model, 'TMOB', array('class' => 'input-text')); ?></td>
                        <td style="padding:15px;"  width="15%"><?php echo $form->labelEx($model, 'TPWD'); ?></td>
                        <td width="35%" id="TPWD"><?php echo $form->textField($model, 'TPWD', array('class' => 'input-text')); ?></td> 
                    </tr>
                    
                    <tr style="text-align:center;"> 
                        <td style="padding:15px;"><?php echo $form->labelEx($model, 'CLUB_ID'); ?></td>
                        <td>
                            <?php echo $form->hiddenField($model, 'CLUB_ID', array('class' => 'input-text')); ?>
                                <span id="club_box">
                                   <?php if($model->TSCHOOL!=null){?><span class="label-box"><?php echo $model->TSCHOOL;?></span><?php }else{?>
                                    <?php ?><span class="label-box" style="display:inline-block;width:20px;"></span><?php }?>
                                </span>
                            <input id="club_select_btn" class="btn" type="button" value="选择单位">
                            <?php echo $form->error($model, 'CLUB_ID', $htmlOptions = array()); ?>
                        </td>
                        <td style="padding:15px;" ><?php echo $form->labelEx($model, 'TMEMO'); ?></td>
                        <td  id="TMEMO"><?php echo $form->textArea($model, 'TMEMO', array('class' => 'input-text','style'=>'margin:15px;')); ?></td> 
                    </tr>
      
                    <tr style="text-align:center;">
                        <td colspan="4" style="text-align:center;padding:20px;">
                            <button class="btn btn-blue" type="submit">保存</button>
                            <button class="btn" type="button" onclick="we.back();">取消</button>
                        </td>
                    </tr>
            </table>
            <?php $this->endWidget(); ?>
        </div><!--box-table end-->
    </div><!--box-content end-->
</div><!--box end-->
<script>
we.tab('.box-detail-tab li','.box-detail-tab-item');
    
    // 选择单位
    var $club_box=$('#club_box');
    var $GameNews_club_id=$('#Teacher_CLUB_ID');
    $('#club_select_btn').on('click', function(){
        $.dialog.data('club_code', 0);
        $.dialog.open('<?php echo $this->createUrl("select/club", array('partnership_type'=>16));?>',{
            id:'danwei',
            lock:true,
            opacity:0.3,
            title:'选择具体内容',
            width:'500px',
            height:'60%',
            close: function () {
                //console.log($.dialog.data('club_id'));
                if($.dialog.data('club_code')>0){
                    club_id=$.dialog.data('club_code');
                    $GameNews_club_id.val($.dialog.data('club_code')).trigger('blur');
                    $club_box.html('<span class="label-box">'+$.dialog.data('club_title')+'</span>');
                }
            }
        });
    });
    
</script> 


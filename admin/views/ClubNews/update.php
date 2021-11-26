<div class="box">
    <div class="box-title c">
    <h1><i class="fa fa-table"></i>学生活动实践详情</h1><span class="back">
    <a class="btn" href="javascript:;" onclick="we.back();">
    <i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
     <?php  $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table class="mt15">
                    <tr>
                        <td width="20%"><?php echo $form->labelEx($model, 'news_code'); ?></td>
                        <td width="80%"><?php echo $model->news_code;?></td> </tr>
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'f_year'); ?></td>
                        <td >
                            <?php echo $form->dropDownList($model, 'f_year', Chtml::listData(base_year::model()->findALL(), 'F_NAME', 'F_NAME'), array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'f_year', $htmlOptions = array()); ?>
                        </td>
                    </tr>                         
                    <tr>
                        <td ><?php echo $form->labelEx($model, 'news_title'); ?></td>
                        <td >
                            <?php echo $form->textField($model, 'news_title', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'news_title', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                   <tr>
                        <td><?php echo $form->labelEx($model, 'news_introduction'); ?></td>
                        <td>
                          <?php echo $form->textArea($model,'news_introduction', array('class' => 'input-text')); ?>
                          <?php echo $form->error($model, 'news_introduction', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px;"><?php echo $form->labelEx($model, 'club_id'); ?></td>
                        <td>
                            <?php echo $form->hiddenField($model, 'club_id', array('class' => 'input-text')); ?>
                            <span id="club_box"><?php if($model->news_club_name!=null){?><span class="label-box"><?php echo $model->news_club_name;?></span><?php }?></span>
                            <input id="club_select_btn" class="btn" type="button" value="选择">
                            <?php echo $form->error($model, 'club_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr id="dis_club_list">
                        <td style="padding:10px;"><?php echo $form->labelEx($model, 'club_list'); ?></td>
                        <td >
                            <?php
                                echo $form->hiddenField($model, 'club_list', array('class' => 'input-text'));
                                $tmp_id=empty($model->club_list) ? '0' : $model->club_list;
                                $club_list = ClubList::model()->findAll('id in ('.$tmp_id.')');
                            ?>
                            <span id="club_list_box">
                                <?php if(!empty($club_list)) foreach ($club_list as $v) {?>
                                    <span class="label-box" id="club_item_<?php echo $v->id;?>" data-id="<?php echo $v->id;?>"><?php echo $v->club_name;?><i onclick="fnDeleteClub(this);"></i></span>
                                <?php }?>
                            </span>
                            <input id="club_list_add_btn" class="btn" type="button" value="选择">
                            <?php echo $form->error($model, 'club_list', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                      <tr>
                        <td><?php echo $form->labelEx($model, 'sign_date_start'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'sign_date_start', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'sign_date_start', $htmlOptions = array()); ?>
                        </td>
                         </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'sign_date_end'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'sign_date_end', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'sign_date_end', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                      <tr>
                        <td><?php echo $form->labelEx($model, 'sign_max'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'sign_max', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'sign_max', $htmlOptions = array()); ?>
                        </td>
                         </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'sign_num'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'sign_num', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'sign_num', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                     <tr>
                        <td><?php echo $form->labelEx($model, 'news_address'); ?></td>
                        <td><!--區域選擇彈窗未顯示-->
                    <?php echo $form->textField($model, 'news_address', array('class' => 'input-text')); ?>
                    <?php echo $form->hiddenField($model, 'Longitude'); ?>
                    <?php echo $form->hiddenField($model, 'latitude'); ?>
                    <?php echo $form->error($model, 'news_address', $htmlOptions = array()); ?>
                     <input id="address_select_btn" class="btn" type="button" value="地图选择">
                        </td>
                    </tr>
                   
                 
                    <tr>
                        
                        <td><?php echo $form->labelEx($model, 'news_pic'); ?></td>
                        <td>
                            
                            <?php echo $form->hiddenField($model, 'news_pic', array('class' => 'input-text fl')); ?>
                            <!-- face_game_bigpic -->
                            <?php $picprefix='';?>
                            <?put_msg($picprefix);?>
                         <div class="upload_img fl" id="upload_pic_ClubNews_news_pic"> 
                          <?php if(!empty($model->news_pic)) {?>
                             <a href="<?php echo $model->news_pic;?>" target="_blank">
                             <img src="<?php echo $model->news_pic;?>" width="100">
                             </a>
                             <?php }?>
                             
                            <script>we.uploadpic('<?php echo get_class($model);?>_news_pic','<?php echo $picprefix;?>','','','',0);</script>
                            <?php echo $form->error($model, 'news_pic', $htmlOptions = array()); ?></div>
                        </td>
                    </tr>
                    
                    <tr style="dispay:black;"><!--news_type=225時顯示-->
                        <td><?php echo $form->labelEx($model, 'news_content'); ?></td>
                        <td colspan="3">
                            <?php echo $form->hiddenField($model, 'news_content_temp', array('class' => 'input-text')); ?>
                            <script>we.editor('<?php echo get_class($model);?>_news_content_temp', '<?php echo get_class($model);?>[news_content_temp]');</script>
                            <?php echo $form->error($model, 'news_content_temp', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                </table>
            </div><!--box-detail-tab-item end-->
        </div><!--box-detail-bd end-->
    <?php 
     if (!isset($_REQUEST['news_type'])) {$_REQUEST['news_type']=0;} 
     if($_REQUEST['news_type']==1){   ?>
        <div class="mt15">
            <table class="table-title"><tr> <td>审核信息</td></tr></table>
            <table>
                <tr>
                    <td width="15%"><?php echo $form->labelEx($model, 'state'); ?></td>
                    <td width="35%">
                        <?php echo $form->radioButtonList($model, 'state', Chtml::listData(BaseCode::model()->getCode(370), 'f_id', 'F_NAME'), $htmlOptions = array('separator' => '', 'class' => 'input-check', 'template' => '<span class="check">{input}{label}</span>')); ?>
                        <?php echo $form->error($model, 'state'); ?>
                    </td>
                    <td width="15%"><?php echo $form->labelEx($model, 'reasons_for_failure'); ?></td>
                    <td width="35%">
                        <?php echo $form->textArea($model, 'reasons_for_failure', array('class' => 'input-text' ,'value'=>'')); ?>
                        <?php echo $form->error($model, 'reasons_for_failure', $htmlOptions = array()); ?>
                    </td>
                </tr>
            </table>
        </div>
      <?php } ?>
        <div class="box-detail-submit">
          <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存</button>
          <button onclick="submitType='shenhe'" class="btn btn-blue" type="submit">提交审核</button>
          <button class="btn" type="button" onclick="we.back();">取消</button>
         </div>
         
    
            <?php $this->endWidget();?>
  </div><!--box-detail end-->
</div><!--box end-->
<div id="dialog2" title="百度地图" style="display: none;"></div>

<script>
we.tab('.box-detail-tab li','.box-detail-tab-item');
var club_id=0;
$('#ClubNews_news_date_start').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});

$('#ClubNews_news_date_end').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});

$('#ClubNews_sign_date_start').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});
$('#ClubNews_sign_date_end').on('click', function(){
WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});

// 滾動圖片處理
var $scroll_pic_img=$('#GameNews_scroll_pic_img');
var $upload_pic_scroll_pic_img=$('#upload_pic_scroll_pic_img');
var $upload_box_Cscroll_pic_img=$('#upload_box_scroll_pic_img');

// 添加或刪除時，更新圖片
var fnUpdatescrollPic=function(){
    var arr=[];
    $upload_pic_scroll_pic_img.find('a').each(function(){
        arr.push($(this).attr('data-savepath'));
    });
    $scroll_pic_img.val(we.implode(',',arr));
    $upload_box_scroll_pic_img.show();
    if(arr.length>=5) {
        $upload_box_scroll_pic_img.hide();
    }
};
// 上傳完成時圖片處理
var fnscrollPic=function(savename,allpath){
    $upload_pic_scroll_pic_img.append('<a class="picbox" data-savepath="'+
    savename+'" href="'+allpath+'" target="_blank"><img src="'+allpath+'" width="100"><i onclick="$(this).parent().remove();fnUpdatescrollPic();return false;"></i></a>');
    fnUpdatescrollPic();
};

$(function(){
    // 推薦到單位
    $('#club_list_add_btn').on('click', function(){
        $.dialog.data('club_id', 0);
        $.dialog.open('<?php echo $this->createUrl("select/club");?>',{
            id:'tuijiandanwei',
            lock:true,
            opacity:0.3,
            title:'选择具体内容',
            width:'500px',
            height:'60%',
            close: function () {
                if($.dialog.data('club_id')>0){
                    if($('#club_item_'+$.dialog.data('club_id')).length==0){
                       $club_list_box.append('<span class="label-box" id="club_item_'+$.dialog.data('club_id')+'" data-id="'+$.dialog.data('club_id')+'">'+$.dialog.data('club_title')+'<i onclick="fnDeleteClub(this);"></i></span>');
                       fnUpdateClub();
                    }
                }
            }
        });
    });
    
    // 選擇單位
    var $club_box=$('#club_box');
    var $ClubNews_club_id=$('#ClubNews_club_id');
    $('#club_select_btn').on('click', function(){
        $.dialog.data('club_id', 0);
        $.dialog.open('<?php echo $this->createUrl("select/club", array('partnership_type'=>16));?>',{
            id:'danwei',
            lock:true,
            opacity:0.3,
            title:'选择具体内容',
            width:'500px',
            height:'60%',
            close: function () {
                //console.log($.dialog.data('club_id'));
                if($.dialog.data('club_id')>0){
                    club_id=$.dialog.data('club_id');
                    $ClubNews_club_id.val($.dialog.data('club_id')).trigger('blur');
                    $club_box.html('<span class="label-box">'+$.dialog.data('club_title')+'</span>');
                }
            }
        });
    });
    
    // 選擇視頻
    var $video_box=$('#video_box');
    var $BoutiqueVideo_club_news_pic=$('#BoutiqueVideo_club_news_pic');
    $('#video_select_btn').on('click', function(){
        $.dialog.data('video_id', 0);
        $.dialog.open('<?php echo $this->createUrl("select/material", array('type'=>253));?>',{
            id:'shipin',
            lock:true,
            opacity:0.3,
            title:'选择具体内容',
            width:'500px',
            height:'60%',
            close: function () {
                //console.log($.dialog.data('club_id'));
                if($.dialog.data('material_id')>0){
                    $BoutiqueVideo_club_news_pic.val($.dialog.data('material_id')).trigger('blur');
                    $video_box.html('<span class="label-box">'+$.dialog.data('material_title')+'</span>');
                }
            }
        });
    });

    // 刪除項目
    var $project_box=$('#project_box');
    var $VideoLive_project_list=$('#VideoLive_project_list');
    var fnUpdateProject=function(){
        var arr=[];
        var id;
        $project_box.find('span').each(function(){
            id=$(this).attr('data-id');
            arr.push(id);
        });
        $VideoLive_project_list.val(we.implode(',', arr));
    };
    
    var fnDeleteProject=function(op){
        $(op).parent().remove();
        fnUpdateProject();
    };
    
    // 推薦到單位更新、刪除
    var $club_list_box=$('#club_list_box');
    var $VideoLive_club_list=$('#ClubNews_club_list');
    var fnUpdateClub=function(){
        var arr=[];
        var id;
        $club_list_box.find('span').each(function(){
            id=$(this).attr('data-id');
            arr.push(id);
        });
        $VideoLive_club_list.val(we.implode(',', arr)).trigger('blur');
    };
    
    var fnDeleteClub=function(op){
        $(op).parent().remove();
        fnUpdateClub();
    };

});

 var $ClubNews_tmp_address=$('#ClubNews_news_address');
    var $ClubNews_longitude=$('#ClubNews_Longitude');
    var $ClubNews_latitude=$('#ClubNews_latitude');
    $('#address_select_btn').on('click', function(){
        $.dialog.data('maparea_address', '');
        $.dialog.open('<?php echo $this->createUrl("select/mapArea");?>',{
            id:'diqu',
            lock:true,
            opacity:0.3,
            title:'选择服务地区',
            width:'907px',
            height:'504px',
            close: function () {
                // console.log('club update AAAAA='+$.dialog.data('maparea_address'));
                if($.dialog.data('maparea_address')!=''){
                    $ClubNews_tmp_address.val($.dialog.data('maparea_address'));
                    $ClubNews_longitude.val($.dialog.data('maparea_lng'));
                    $ClubNews_latitude.val($.dialog.data('maparea_lat'));
                }
            }
        });
    });
</script> 

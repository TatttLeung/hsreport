  <style>
       .div {
           width: 90%;
       }

       .title {
           border-bottom: 30px;
       }

       .main {
            float:right;
           text-align: center;
           /* border: 1px solid black; */
       }
   </style>
<div class="box">
     <div class="box-title c"><h1><i class="fa fa-table"></i>教师提交确认</h1></div><!--box-title end-->
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加</a>
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>刪除</a>
        </div><!--box-header end-->


    </form>
</div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th style='text-align: center;'>序号</th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('cyear');?></th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('cterm');?></th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('ccourseid');?></th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('ccoursename');?></th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('cworkid');?></th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('cstuname');?></th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('cstuid');?></th>
                        <th style='text-align: center;'>文件</th>
                        <th style='text-align: center;'><?php echo $model->getAttributeLabel('cscore');?></th>
                        <th style='text-align: center;'>操作</th>
                   
                    </tr>
                </thead>
                <tbody>
                <?php $basepath=BasePath::model()->getPath(124);?>
<?php 
$index = 1;
foreach($arclist as $v){ 
?>
                    <tr>
                        
                        <td style='text-align: center;'><span class="num num-1"><?php echo $index ?></span></td>
                        <td style='text-align:center;'><?php echo $v->cyear; ?></td>
                        <td style='text-align:center;'><?php echo $v->cterm; ?></td>
                        <td style='text-align: center;'><?php echo $v->ccourseid; ?></td>
                        <td style='text-align: center;'><?php echo $v->ccoursename; ?></td>
                        <td style='text-align: center;'><?php echo $v->cworkid; ?></td>
                        <td style='text-align: center;'><?php echo $v->cstuname; ?></td>
                        <td style='text-align: center;'><?php echo $v->cstuid; ?></td>
                        <td style='text-align: center;'><?php echo BaseLib::model()->show_pic($v->cpath);
                        ?></td>
                        <td style='text-align: center;'><?php echo $v->cscore; ?></td>
                        <td style='text-align: center;'>
     
        <a class="btn" href="<?php echo $this->createUrl('update', array('id'=>$v->id));?>" title="编辑"><i class="fa fa-edit"></i></a>
        <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->id;?>', deleteUrl);" title="删除"><i class="fa fa-trash-o"></i></a>
    </td>
                    </tr>
<?php $index++; } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        
        <div class="box-page c"><?php $this->page($pages);?></div>
        
    </div><!--box-content end-->
</div><!--box end-->


<script>

var deleteUrl = '<?php echo $this->createUrl('delete', array('id'=>'ID')); ?>';
$(function(){
    var start_time=$('#start_date');
    var end_time=$('#end_date');
    start_time.on('click', function(){
        WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});
    end_time.on('click', function(){
         WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss '});});

});
function preview(id){
 $.dialog.open('<?php echo $this->createUrl("Article/preview");?>&id='+id,{
            id:'article',
            lock:true,
            opacity:0.3,
            title:'文章预览',
            width:'600px',
            height:'100%',
            close: function() {
               we.reload();
                
            }
        });
 
}




// function read(wordname){
//  $.dialog.open('<?php echo $this->createUrl("Article/read");?>&wordname='+wordname,{
//             id:'article',
//             lock:true,
//             opacity:0.3,
//             title:'文章预览',
//             width:'700px',
//             height:'90%',
//             close: function() {
               
                
//             }
//         });
// }
</script>

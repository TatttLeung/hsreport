<?php

class teainfoController extends BaseController {

    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }

    public function actionIndex($styear="0",$sterm="1") {
    set_cookie('_currentUrl_', Yii::app()->request->url);
    $modelName = $this->model;
    $model = $modelName::model();
    $criteria = new CDbCriteria;
   // $w1=get_where('1=1',($styear!="0"),'f_year',$styear,'"');
    //$criteria->condition=get_where($w1,($sterm!="0"),'f_term',$sterm,'"');
    //$criteria->order = 'sign_date_start desc';
    $data = array();
    parent::_list($model, $criteria, 'index', $data,20);
    }

   public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        parent::_create($model, 'update', $data, get_cookie('_currentUrl_'));
    }

    public function actionUpdate($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
           $data = array();
           $data['model'] = $model;
           $this->render('update', $data);
        } else {
            put_msg($_POST);
            $temp=$_POST[$modelName];
            
            
           $this-> saveData($model,$temp);
        }
    }


    public function actionDelete($id) {
        parent::_clear($id);
    }
    
    function saveData($model,$post) {
           $model->attributes =$post;
           show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');  
     }

     private function DeleteImage($id)
    {
        $imagePath=ROOT_PATH.'/uploads/image/column/';
        $array = explode(",", $id);
        foreach ($array as $v) {
          $model=NewsColumn::model()->find('id='.$v); 
          if($model->image!=''&&file_exists($imagePath.$model->image))
          {
            unlink($imagePath.$model->image);
          }
        }
        
    }

}

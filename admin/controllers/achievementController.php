<?php

class achievementController extends BaseController {

    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }

     public function actionIndex( $id="0",$keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;

        if($id=="0")
        {
            $criteria->condition=get_like($criteria->condition,'coursename,courseteacher',$keywords,'');//get_where
            $criteria->order = 'id DESC';
        }
        else
        {
            $criteria->condition="1=1 and id="."'$id'";
        }
        

        //1=1 and workyear="2020-2021" and workterm="上学期" and workcourse="程序设计基础" and workteacher="曾锡山"
        //put_msg("21"." ".$criteria->condition);
        /*criteria为筛选条件，更改对条件即可完成筛选，第一个不用改，第二个改成index里面对应命名
        （即参数，应设置为默认0），第三个为此模块中的筛选的表名，第四个为index里面对应命名（即参数）*/
        parent::_list($model, $criteria, 'index', array()); //调用S
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


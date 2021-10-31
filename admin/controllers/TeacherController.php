<?php

class TeacherController extends BaseController {

   protected $model = '';
   public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }
   public function actionDelete($id) {
        parent::_clear($id,'','F_ID');
    }
 
    public function actionIndex($keywords = '',$clubtype= 0) {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $club_id=get_session('club_id');
        if(($clubtype == 0)){
         $w1='CLUB_ID<2000';
        }
        else if(($clubtype == 1)){
             $w1='CLUB_ID>2000';
        }
      //  $w1=get_where('1=1',($club_id>1),'club_id',$club_id,"");
        $criteria->condition=get_like($w1,'TCNAME,TSCHOOL',$keywords,'');//get_where
        $criteria->order = 'TCOD';

        put_msg($criteria->condition);
        parent::_list($model, $criteria);
    }
    
    public function aactionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        parent::_create($model, 'update', $data, get_cookie('_currentUrl_'));
    }

      public function actionCreate() {
       $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $this->render('update', $data);
        }else{
            $this-> saveData($model,$_POST[$modelName]);
        }
 }

    public function actionUpdate($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
       if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $data['model']->F_ROLECODE=explode(',',$data['model']->F_ROLECODE);
            $this->render('update', $data);
        } else {
            $this-> saveData($model,$_POST[$modelName]);
        }
    }
  
 function saveData($model,$post) {
       $model->attributes =$post;
     //  put_msg($post);
    //   $model->F_ROLECODE=gf_implode(',',$post['F_ROLECODE']);
       show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');  
 }


}
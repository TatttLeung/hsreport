<?php

use yii\validatoers;

class teaconfirm extends BaseModel {
    public $Article_pic='';
    public function tableName() {
        return '{{workcommit}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('cyear', 'required', 'message' => '{attribute} 不能为空'),
            array('cterm','default','value'=>date('Y-m-d H:i:s',time())),
            array('ccoursename', 'required', 'message' => '{attribute} 不能为空'),
            array('cstuid', 'required', 'message' => '{attribute} 不能为空'),
             array('cscore', 'required', 'message' => '{attribute} 不能为空'),
            array('cyear,cterm,ccoursename,cstuid,cscore,cpath,cstuname,ccourseid,cworkid','safe'),
        );
    }   


    /**
     * 模型关联规则
     */
    public function relations() {
        return array(
            'frequency'=>array(self::BELONGS_TO, 'frequency', ['frequency_id'=>'id'],'select'=>'name'),
            'provinceName'=>array(self::BELONGS_TO, 'location', ['province'=>'id'],'select'=>'name'),
             'cityName'=>array(self::BELONGS_TO, 'location', ['city'=>'id'],'select'=>'name'),
             'areaName'=>array(self::BELONGS_TO, 'location', ['area'=>'id'],'select'=>'name'),
        );
    }

    /**
     * 属性标签
     */
    public function attributeLabels() {
        return array(
            'cyear'=>'学年',
            'cterm'=>'学期',
            'ccourseid'=>'课程编码',
            'ccoursename'=>'课程名称',
            'cworkid'=>'作业序号',
            'cstuid'=>'学生学号',
            'cstuname'=>'学生姓名',
            'cpath'=>'文件路径',
            'cscore'=>'作业分数',

 );
}

    /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    protected function beforeSave() {
        parent::beforeSave();
        if (1==1){
            put_msg(67);
            put_msg("coursename='$this->ccoursename'");
            $name = courseinfo::model()->find("coursename='$this->ccoursename'");
            put_msg(68);
            $this->ccourseid=$name->courseid;     
     }
     return true;
 }
    

    public function getCode() {
        return $this->findAll('1=1');
    }
    public function picLabels() {
        return 'cpath';//缩略图要加这一个函数
    }
}

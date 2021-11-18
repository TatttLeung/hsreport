<?php

class ProjectcommitController extends BaseController {

    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }

     public function actionIndex($styear="",$sterm="") {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        //$this->open();
        $criteria = new CDbCriteria;
        $w1=get_where('1=1',$styear,'courseyear',$styear,'"');
        //put_msg("19"." ".$w1);
        $criteria->condition=get_where($w1,$sterm,'courseterm',$sterm,'"');
        //put_msg("21"." ".$criteria->condition);
        /*criteria为筛选条件，更改对条件即可完成筛选，第一个不用改，第二个改成index里面对应命名
        （即参数，应设置为默认0），第三个为此模块中的筛选的表名，第四个为index里面对应命名（即参数）*/
        parent::_list($model, $criteria, 'index', array()); //调用S
    }

   public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
       // put_msg(37);
         if (!Yii::app()->request->isPostRequest) {
           // put_msg(39);
            $data = array();
            $data['model'] = $model;
            $this->render('update', $data);
            //put_msg(43);
        }else{
           // put_msg(44);
            //put_msg($_POST);
            $temp=$_POST[$modelName]; 
           // put_msg(47);
            $this->saveData($model,$temp);
        }
        //$this->open($model->excelPath);
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
       // $this->open($model->excelPath);
    }


    public function actionDelete($id) {
        parent::_clear($id);
    }
    
    function saveData($model,$post) {
           $model->attributes =$post;
           $status = 0;
           if(!(substr($model->excelPath,-4,4)=='xlsx'||substr($model->excelPath,-3,3)=='xls'))
            {
                $status = 0;
            }
            else
            {
                $this->open('F:/wamp64/www/hsreport/uploads/temp/'.$model->excelPath);
                $status = 1;
            }
           
           //put_msg(64);
           show_status($status,'保存成功', get_cookie("_currentUrl_"),'文件类型错误');  
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

    public function open($excelFile = "")
    {

    Yii::$enableIncludePath = false;
                Yii::import('application.extensions.PHPExcel.PHPExcel', 1);
                $phpexcel = new PHPExcel;
                $extension="xlsx";
                if ($extension=='xls') {
                    $excelReader = PHPExcel_IOFactory::createReader('Excel5');
                } else {
                    $excelReader = PHPExcel_IOFactory::createReader('Excel2007');
                }
                      $objPHPExcel = $excelReader->load($excelFile);//
                        $sheet = $objPHPExcel->getSheet(0);
                        $highestRow = $sheet->getHighestRow(); // 取得总行数
                        $nameArray=array('coursename','coursescore','courseteacher','coursestunum','courseclass','courseyear','courseterm','coursetype','courseleader');
                        $col=array('B','C','D','E','F','G','H','I','J');
                            for ($row = 3; $row <= $highestRow; $row++){
                                $modelName = $this->model;
                                $a = new $modelName('create');
                                $data = array();
/*                                $a->courseyear=$sheet->getCell('B'.$row)->getValue();//学年
                                $a->courseterm=$sheet->getCell('C'.$row)->getValue();//学期
                                $a->courseid = $sheet->getCell('D'.$row)->getValue();  // 课程编码
                                $a->coursename = $sheet->getCell('E'.$row)->getValue();  // 课程名称
                                $a->courseteacher = $sheet->getCell('F'.$row)->getValue();  // 任课老师
                                $a->stuname = $sheet->getCell('G'.$row)->getValue();  // 学生姓名
                                $a->stuid = $sheet->getCell('H'.$row)->getValue();  // 学生学号
                                $a->save();*/
                                /*$col = 'B';*/
                                for($i=0 ; $i<9;$i++)
                                {
                                    $a->{$nameArray[$i]}=$sheet->getCell($col[$i].$row)->getValue();
                                }
                                $a->save();
                            }
                            

    }
}
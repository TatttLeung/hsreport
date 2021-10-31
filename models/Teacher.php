<?php

class Teacher extends BaseModel {

    public function tableName() {
        return '{{teacher}}';
    }

    /**
     * 模型验证规则
     * {"TCOD":"9601","TCNAME":"1231","TMOB":"1231","TPWD":"23","CLUB_ID":"3","TMEMO":"","F_ROLECODE":["38"]}
     */
    public function rules() {
        return array(
            array('TCOD', 'required', 'message' => '{attribute} 不能为空'),
            array('TCNAME', 'required', 'message' => '{attribute} 不能为空'),
          array('
  F_ID,TCOD,  TUNAME,
TCNAME,TENAME,TPWD,TSEX,TTEL,TMOB,
  TADDR,
  TIDN,
  TIDT,
  TIND,
  TBIRTH,
  TNHK,
  TSCHOOL,
  CLUB_ID,
  TORIGIN,
  TBORNP,
  TNATION,
  TMEMO,
  TEMAIL,
  TBANK,
  TACCNAME,
  F_ROLECODE,
  F_ROLENAME,CLUB_NAME,
  TDEPART', 'safe'),
        );
    }

    /**
     * 模型关联规则
     */
    public function relations() {
        return array(
        );
    }

    /**
     * 属性标签
     */
    public function attributeLabels() {
        return array(
  'F_ID' =>'ID',
  'TCOD' =>'教師編號',
  'TUNAME'=> '用戶編號',
  'TCNAME'=>'姓名',
  'TENAME'=> '英文名字',
  'TPOS' => '職位',
  'TAUTH'=> '操作權限',
  'TPWD' => '密碼',
  'TSEX' => '性別',
  'TTEL' => '聯系電話',
  'TMOB' => '手機號',
  'TADDR' => '地址',
  'TIDN' => '省份證號碼',
  'TIDT' => '身份證號類型',
  'TIND' => '發證時間',
  'TBIRTH' => '出生日期',
  'TNHK' => '不用',
  'CLUB_ID' => '機構或學校',
  'CLUB_NAME' => '機構',
  'TSCHOOL' => '機構或學校',
  'TORIGIN'=> '籍貫',
  'TMERRY' => '婚否',
  'TBORNP' => '出生地',
  'TNATION' => '國籍',
  'TFRIEND' => '介紹人',
  'TFADDR' => '介紹人地址',
  'TFPHONE' => '聯系電話',
  'TMEMO' => '備註',
  'TEMAIL' => '郵箱地址',
  'TBANK' => '銀行名稱',
  'TACCNAME' => '銀行賬戶',
  'TACCNO' => '賬號',
  'TPHOTO' => '圖片',
  'TTNO' => '教師證號',
  'F_ROLECODE' => '角色編碼',
  'F_ROLENAME' => '角色名稱',
  'TDEPART' => '分校名稱',
        );
    }



    /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
       // put_msg($this->CLUB_ID);
        $name = ClubList::model()->find('club_code='.$this->CLUB_ID);
        $this->CLUB_NAME=$name->club_name;
        //     put_msg($this->CLUB_NAME);
         parent::beforeSave();
       
        return true;
    }
    public function getCode($is_visible) {
        return $this->findAll('is_visible='.$is_visible);
    }

    public function getTypeCode() {
        return $this->getCode(0);
    }

}

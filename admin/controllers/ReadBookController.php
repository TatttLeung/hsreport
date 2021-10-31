<?php
 
//TSGBZ-BTLWJ-ZB5FB-FEHUH-VLBAV-TKFEJ
class  ReadBookController extends BaseController {

    
      public function actionUpload()
    {
      $data=array();
      $file1=$_FILES['file'];
      $newName=$_POST['newName'];
      if(empty($file1)||$file1['error']==4) ajax_exit(array('status' => 0, 'msg' => '上传失败，稍后再试'));
      if($file1['error']==5) ajax_exit(array('status' => 0, 'msg' => '上传失败，上传文件大小为0'));
      if($file1['error']==1) ajax_exit(array('status' => 0, 'msg' => '上传文件大小超出范围'));
            //修改php.ini中的upload_max_filesize来增大范围
      $attach = CUploadedFile::getInstanceByName('file');
      $savepath = ROOT_PATH . '/uploads/file/';
      $sitepath = SITE_PATH . '/uploads/file/';
      $prefix='';
      $datePath = 'article/';
        if (!is_dir($savepath . $datePath)) {
            mk_dir($savepath . $datePath);
        }
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'content-type:application/octet-stream',
                'content' => file_get_contents($attach->tempName),
            ),
        );
        $file = stream_context_create($options);
        $fileName=$datePath.$newName. '.'.$attach->extensionName;
        if ($attach->saveAs($savepath . $fileName)) 
        {
            ajax_exit(array('status' => 1, 'msg' => '上传成功', 'savename' => $newName. '.'.$attach->extensionName, 'allpath' => $sitepath . $fileName));
        } else {

            ajax_exit(array('status' => 0, 'msg' => '上传失败'));
        }
    }

//     public function actionGetOpenId($js_code) //获取openid，用于发送通知
//     {
//       $data=array();
      
//       // 这里是空的，拿不到code，报错41008
//       $post=file_get_contents("php://input");
//       $json= json_decode($post,true);
      
//       // $appid = 'wxdf763f7e23d379bd';  //appId
//       // $secret = 'c34f407da6364bbb7375a00e739bdd98'; //appSecret

//       $appid = 'wx1133699f5b968a37';  //appId
//       $secret = 'b5cf1af86bf9024b7073ee77521e614b'; //appSecret

//       // $code = $json["code"];
//       $code = $js_code;

//       $url = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$secret.'&js_code='.$code.'&grant_type=authorization_code';
//       $curl = curl_init();

//       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//       curl_setopt($curl, CURLOPT_TIMEOUT, 500);
// // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
//       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//       curl_setopt($curl, CURLOPT_URL, $url);

//       $res = curl_exec($curl);
//       curl_close($curl);
//       $json_obj = json_decode($res, true);
//       echo CJSON::encode($json_obj);
//       // $data['openid'] =$json_obj["openid"];
//       // echo CJSON::encode($data);
//     }

// function returnAsskey()  //获取access_token
// {
//     $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxdf763f7e23d379bd&secret=c34f407da6364bbb7375a00e739bdd98';
//      $result = $this->curl_get($url);
//     return $result->access_token;
// }

// function curl_get($url) {
//     $curl = curl_init();
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//     $data = curl_exec($curl);
//     $err = curl_error($curl);
//     curl_close($curl);
//     return json_decode($data);//对数据进行json解码
// }



// private function checkSignature()    //用于验证服务器
// {
//     $signature = $_GET["signature"];
//     $timestamp = $_GET["timestamp"];
//     $nonce = $_GET["nonce"];

//     $token = 'lukaifeng'; 
//     $tmpArr = array($token, $timestamp, $nonce);
//     sort($tmpArr, SORT_STRING);
//     $tmpStr = implode( $tmpArr );
//     $tmpStr = sha1( $tmpStr );

//     if( $tmpStr == $signature ){
//         return true;
//     }else{
//         return false;
//     }
// }
//   public function valid($return=false)  //同上
//   { 
//     $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"]: ''; 
//     $signature = $_GET["signature"];
//     $timestamp = $_GET["timestamp"];
//     $nonce = $_GET["nonce"];

//     $token = 'lukaifeng'; 
//     $tmpArr = array($token, $timestamp, $nonce);
//     sort($tmpArr, SORT_STRING);
//     $tmpStr = implode( $tmpArr );
//     $tmpStr = sha1( $tmpStr );

//     if( $tmpStr == $signature )
//          echo $echoStr;
//     else echo "fail"; 
//   } 

    // public function actionSendMsg()
    // {
    //     $this->valid();  //验证完即可删除
    //     $wx=User::model()->findAll('phone=13824444488');
    //     foreach ($wx as $k) {

    //     $data = [
    //         "touser"=>$k->open_id,
    //         "template_id"=>'GUXtZw5czUOD1dmV6Ak5guggnpXK8vohCtgbLfck54g', //消息模板id
    //         "form_id"=>$k->form_id,
    //         "data"=>[
    //             "keyword1"=>[
    //                 "value"=>"123",
    //                 "color"=>"#9b9b9b"
    //             ],
    //             "keyword2"=>[
    //                 "value"=>"456",
    //                 "color"=>"#9b9b9b"
    //             ],
    //             "keyword3"=>[
    //                 "value"=>"789",
    //                 "color"=>"#9b9b9b"
    //             ],
    //         ]
    //     ];
    //     $data=json_encode($data);
    //     $header= array("Content-type: application/json;charset=UTF-8","Accept: application/json","Cache-Control: no-cache", "Pragma: no-cache");

    //     $ast=get_cookie('access_token');
    //     if(empty($ast))
    //        $ast=$this->returnToken();
    //     $url="https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=".$ast;
    //     $curl = curl_init();
    //     curl_setopt($curl,CURLOPT_URL,$url);  //设置url
    //     curl_setopt($curl,CURLOPT_POST,1);      //post方法
    //     curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); //阻止cURL验证对等方的证书
    //     curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false); //不检查ssl
    //     curl_setopt($curl,CURLOPT_POSTFIELDS,$data); //设置数据
    //     curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); //将curl_exec()的执行结果以字符串返回，0为直接输出
    //     curl_setopt($curl,CURLOPT_HTTPHEADER,$header); //设置http头部
    //     $res = curl_exec($curl);
    //     curl_close($curl);
    //     echo $res;
    //   }
    // }

    public function actionRegister()   //注册
    {
      $data=array();
      $post=file_get_contents("php://input");
      $json=json_decode($post,true);
      $formdata=$json['formData'];
      $User=User::model()->find("account=?",[$formdata['userName']]);
      if(!empty($User)) $data['status']=-1;
      else{
        $User=new User();
        $User->account=$formdata['userName'];
        $User->password=$formdata['password'];
        $User->name=$formdata['name'];
        $User->school=$formdata['school'];
        $User->grade=$formdata['grade'];
        $User->class=$formdata['classNum'];
        $data['status']=$User->save();
      }
      echo CJSON::encode($data);
    }

    public function actionModify()   //修改信息
      {
        $data=array();
        $post=file_get_contents("php://input");
        $json=json_decode($post,true);
        $formdata=$json['formData'];
        $User=User::model()->find("account='".$formdata['account']."'");
        $User->name=$formdata['name'];
        $User->school=$formdata['school'];
        $User->grade=$formdata['grade'];
        $User->class=$formdata['classNum'];
        $data['user']=$User;
        $data['status']=$User->save();
        echo CJSON::encode($data);
      }

     public function actionLogin()   //登陆
    {
      $data=array();
      $post=file_get_contents("php://input");
      $json=json_decode($post,true);  
      $formdata=$json['formData'];
      $User=User::model()->find("account=? and password=?",[$formdata['userName'],$formdata['password']]);
      $data['User']=$User;
      echo CJSON::encode($data);
    }

     public function actionGetNews($page,$pageSize=15)    //获取投稿活动
    {
      $data=array();
      $page*=$pageSize;
      $newsList=NewsColumn::model()->findAll('1=1 limit '.$page.','.$pageSize);
      $data['newsList']=$newsList;
      echo CJSON::encode($data);
    }

     public function actionBeforeIntoUploads()    //进入投稿界面 准备
    {
      $data=array();
      $data['articleType']=ArticleType::model()->findAll();
      echo CJSON::encode($data);
    }

     public function actionSendArticle()   //投稿
    {
      $data=array();
      $post=file_get_contents("php://input");
      $json=json_decode($post,true);
      $formdata=$json['formData'];
      $article=new Article();
      $article->title= $formdata['title'];
      $article->introduce= $formdata['introduce'];
      $article->author= $json['author'];
      $article->author_id= $json['authorId'];
      $article->column_id= $json['newsId'];
      $article->submit_time= get_date();
      $article->file=$json['newName'];
      $article->grade=$json['grade'];
      $article->status=0;
      $article->status_name='未审核';
      $article->share=$json['share'];
      $article->type_id=$json['typeId'];
      $article->type_name=$json['type']; 
      $article->good_mark=0; 
      $status=$article->save();
      $data['status']=$status;
      echo CJSON::encode($data);
    }

      public function actionArticleList($page=0,$pageSize=10)   //优秀文章列表  
    {
      $data=array();
      $page*=$pageSize;
      $article=Article::model()->findAll('share_state = 1 order by submit_time DESC limit '.$page.','.$pageSize); //status > 1 and 
      $data['article']=$article;
      echo CJSON::encode($data);
    }


    public function actionSaveArticle($list,$newsId,$title,$introduce,$author,$grade,$authorId,$type,$typeId,$share,$file,$sendWord)
    {
      $data=array();
      $text='';
      $img='';
      $flag = false;

      // GET方法默认为字符串，这里手动转成BOOL
      if($sendWord=="true")
        $flag = true;
      else
        $flag = false;

      if(!$flag){
          $list=json_decode($list);
          foreach ($list as $k) {
            if($k->type==0) 
              $text.=$k->info.' <image> ';
            else {
              $img.=$k->info.',';
            }
          }
      }
      else{
          $dir=ROOT_PATH.'/uploads/file/article/';
          $filename=$dir.$file;
          //  $word = new COM("word.application",null,CP_UTF8);
          //  $word->Visible = 0;
          //  $word->Documents->open($filename);
          //  $text= $word->ActiveDocument->content->Text;
          //  $word->Quit();
           if('.docx'==substr($file, strrpos($file,'.'))){           
               $img=$this->readZipPart($filename);       
               $text=$this->xmlText;
           }
           else if('.txt'==substr($file, strrpos($file,'.'))){
              $myfile = fopen($filename, "r") or die("Unable to open file!");
              $text=fread($myfile,filesize($filename));
              fclose($myfile);
           }
           else{
            $data['status']=false;
            $data['msg']='上传文件仅支持.docx和.txt，请重新上传文件';
            echo CJSON::encode($data);
            return;
           }
          // $text=str_replace("/"," <image> ",$text);
        
      }
      $article=new Article();
      $article->title= $title;
      $article->introduce= $introduce;
      $article->author= $author;
      $article->author_id= $authorId;
      $article->column_id= $newsId;
      $article->submit_time= get_date();
      $article->grade=$grade;
      $article->content=$text;
      $article->image=$img;
      $article->status=1; // 1："未审核"
      $article->status_name='未审核';
      $article->share_state=$share;
      $article->type_id=$typeId;
      $article->type_name=$type; 
      $article->good_mark=0;
      $article->file=$file;
      $data['status']=$article->save();
      echo CJSON::encode($data);
    }


//删除目录
 function deldir($path){
     //如果是目录则继续
     if(is_dir($path)){
        //扫描一个文件夹内的所有文件夹和文件并返回数组
       $p = scandir($path);
       foreach($p as $val){
          //排除目录中的.和..
          if($val !="." && $val !=".."){
             //如果是目录则递归子目录，继续操作
             if(is_dir($path.$val)){
                //子目录中操作删除文件夹和文件
                $this->deldir($path.$val.'/');
                //目录清空后删除空文件夹
                @rmdir($path.$val.'/');
             }else{
                //如果是文件直接删除
                unlink($path.$val);
             }
          }
       }
    }
  }
    
    //将docx中文字图片读取出来
    private function readZipPart($filename) {
        $zip = new ZipArchive();
        $copyName=array();
        $img='';
       if (true === $zip->open($filename)) {
            $zip->extractTo('uploads/file/temp');
            $zip->close();
            $this->readXml('uploads/file/temp/word/document.xml');   
            if(strpos($this->xmlText,"<image>")!=false)  //如果有图片则将图片移动到相应目录下
               $this->xCopy('uploads/file/temp/word/media', ROOT_PATH.'/uploads/image/article', $child = 1,$copyName);
            $this->deldir('uploads/file/temp/');
            $num=0;
            for($i=0;$i<count($this->xmlImg);$i++)
            {
              for($j=$i-1;$j>=0;$j--)
              {
                if($this->xmlImg[$j]==$this->xmlImg[$i]){
                    $img.=$copyName[$j].',';
                    $num++;
                    break;
                }
              }
              $img.=$copyName[$i-$num].',';
            }
        } 
        else die('non zip file');
        return $img;

    }

    
    //复制
    public function xCopy($source, $destination, $child = 1,&$copyName){
        // xCopy("feiy","feiy2",1):拷贝feiy下的文件到 feiy2,包括子目录
        // xCopy("feiy","feiy2",0):拷贝feiy下的文件到 feiy2,不包括子目录
        //参数说明：
        // $source:源目录名
        // $destination:目的目录名
        // $child:复制时，是不是包含的子目录
        // $copyName:文件复制后重命名的名字
        if(!is_dir($source)){
            echo("Error:the $source is not a direction!");
            return 0;
        }

        if(!is_dir($destination)){
            mkdir($destination,0777);
        }

        $handle=dir($source);
        while($entry=$handle->read()) {
            if(($entry!=".")&&($entry!="..")){
                if(is_dir($source."/".$entry)){
                    if($child)
                         $this->xCopy($source."/".$entry,$destination."/".$entry,$child,$copyName);
                    }
                else{
                    $extensionName=substr($entry, strrpos($entry,'.'));
                    $temp=uniqid('', true).$extensionName;
                    array_push($copyName,$temp);
                    copy($source."/".$entry,$destination."/".$temp);
                }
            }
        }
    }

    public function actionGetMyArticle($page,$userId,$limit=10)
     {
        $page*=$limit;
         $article=Article::model()->findAll('author_id='.$userId.' order by submit_time DESC limit '.$page.','.$limit);
         $data['article']=$article;
         echo CJSON::encode($data);
     }

     public function actionGoodChange($goodS,$id)
     {
         $article=Article::model()->find('id='.$id);
          put_msg($article->good_mark);
           put_msg($goodS);
           if($goodS)
         $article->good_mark++;
       else 
        $article->good_mark--;
         put_msg($article->good_mark);
         $data['status']=$article->save();
         echo CJSON::encode($data);
     }

    public function actionUploadImg()
    {
      $data=array();
      $file1=$_FILES['file'];
      if(empty($file1)) ajax_exit(array('status' => 0, 'msg' => '上传失败'));
      $attach = CUploadedFile::getInstanceByName('file');
      $savepath = ROOT_PATH . '/uploads/image/article/';
      $sitepath = SITE_PATH . '/uploads/image/article/';
      $prefix='';
        if (!is_dir($savepath)) {
            mk_dir($savepath);
        }
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'content-type:application/octet-stream',
                'content' => file_get_contents($attach->tempName),
            ),
        );
        $file = stream_context_create($options);
      // $fileName =$datePath.$prefix . uniqid('', true) . '.' . $attach->extensionName;
      $fileName =uniqid('', true) . '.' . $attach->extensionName;
        if ($attach->saveAs($savepath . $fileName)) {
            ajax_exit(array('status' => 1, 'msg' => '上传成功', 'savename' => $fileName, 'allpath' => $sitepath . $fileName));
        } else {
            ajax_exit(array('status' => 0, 'msg' => '上传失败'));
        }
    }
      
    private $xmlText='';
    private $xmlImg=array();

    private function readXml($dir)
    {
      $doc = new DOMDocument();
      $doc->load($dir);

      $x = $doc->documentElement;
      foreach ($x->childNodes AS $item)
      {
        $this->getChildNodes($item);
      }
    }

    //读取xml标签
    private function getChildNodes($node)
    {
      if($node->nodeName=="w:t") 
      {
        $this->xmlText.=$node->nodeValue;
        return;
      }
      if($node->nodeName=="w:drawing")   
      {
        $this->xmlText.=" <image> ";
      }
       if($node->nodeName=="pic:cNvPr")
      {
        array_push($this->xmlImg,$node->getAttribute("name"));
        return;
      }
      if($node!=null&&$node->hasChildNodes()){
        foreach($node->childNodes AS $i)
          {
            $this->getChildNodes($i);
          }
      }

    }

}

<?php
namespace Home\Controller;
use Think\Controller;
header('Access-Control-Allow-Origin:*');
class IndexController extends Controller {
    public static $id;   // 客服id
    public function __construct(){
        parent::__construct();
        $this->assign("id",self::$id);
    }

    public function index(){
        $this->display();
    }

    public function chatindex(){
        $id = self::$id = I("id") ;
        $_SESSION['id'] = $id;
        $data = M("message")->alias("m")->where(['m.toid'=>$id])
            ->join("left join `user` u on u.id=m.fromid")
            ->field("m.fromid,m.toid,u.name")
            ->group("m.fromid")
            ->select();
        $this->assign("id",$id);
        $this->assign("data",$data);
        $this->display("chat/index");
    }

    public function central(){
        $id = $_SESSION['id'];   // 客服id
        $toid = I("toid");   // 用户id
        $where = "(`fromid` = $toid AND `toid` = $id) or (`fromid` = $id AND `toid` = $toid) ";
        $data = M("message")->where($where)->select();
        foreach ($data as $k=>$v){

            $data[$k]['content1'] = json_decode($v['content']);
        }
        /*echo "<pre>";
        print_r($data);
        exit;*/


        $this->assign("id",$id);
        $this->assign("toid",$toid);
        $this->assign("data",$data);

        $this->display("public/index");
    }


    public function upload(){


//        print_r($_FILES);
//        exit;

        $path = './Public/uploads/admin/';
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $path; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();


        $url = '/tp3'."/Public/uploads/admin/".$info['file']['savepath'].$info['file']['savename'];
        $data['url'] = $url;
        if(!$info) {// 上传错误提示错误信息
            $data['code'] = "1";
            echo json_encode($data);
        }else{// 上传成功
            $data['code'] = "2";
            echo json_encode($data);
        }
    }



}
<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */


use \GatewayWorker\Lib\Gateway;
use \GatewayWorker\Lib\Db;
/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */

class Events
{

    public static $db = null;

    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     * 
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id)
    {

    }

    public static function onWorkerStart(){

    }
    
   /**
    * 当客户端发来消息时触发
    * @param int $client_id 连接id
    * @param mixed $message 具体消息
    */
   public static function onMessage($client_id, $message)
   {
       $data = json_decode($message,true);
       switch ($data['type']){
           // 将client_id与消息发送者id绑定
           case "bind" :
               Gateway::bindUid($client_id, $data['fromid']);
           return;

           // 判断消息接收者是否在线
           case "isUid" :
               $data['type'] = "init";
               if(Gateway::isUidOnline($data['toid'])){
                   $data['exist'] = "1";
               }
               else{
                   $data['exist'] = "2";
               }
               Gateway::sendToUid($data['fromid'], json_encode($data));
               return;

           // 接收客户端发送的消息
           case "say" :
               self::getMysql($data);
               // 返回给自己的消息
               $say_fromid['type'] = "say_fromid";
               $say_fromid['fromid'] = $data['fromid'];
               $say_fromid['toid'] = $data['toid'];
               $say_fromid['text'] = $data['text'];

               // 返回给接收者的消息
               $say_toid['type'] = "say_toid";
               $say_toid['fromid'] = $data['fromid'];
               $say_toid['toid'] = $data['toid'];
               $say_toid['text'] = $data['text'];

               Gateway::sendToUid($data['fromid'], json_encode($say_fromid));
               Gateway::sendToUid($data['toid'], json_encode($say_toid));
               return;

           case "img" :
               self::getMysql($data);
               // 返回给自己的消息
               $say_fromid['type'] = "img_fromid";
               $say_fromid['fromid'] = $data['fromid'];
               $say_fromid['toid'] = $data['toid'];
               $say_fromid['text'] = $data['text'];

               // 返回给接收者的消息
               $say_toid['type'] = "img_toid";
               $say_toid['fromid'] = $data['fromid'];
               $say_toid['toid'] = $data['toid'];
               $say_toid['text'] = $data['text'];

               Gateway::sendToUid($data['fromid'], json_encode($say_fromid));
               Gateway::sendToUid($data['toid'], json_encode($say_toid));
               return;

       }

   }
   
   /**
    * 当用户断开连接时触发
    * @param int $client_id 连接id
    */
   public static function onClose($client_id)
   {
       // 向所有人发送 
//       GateWay::sendToAll("$client_id logout\r\n");
   }


   /**
    *  连接数据库
    * */
   public static function getMysql($data){
       $db = Db::instance('db');
       $time = date("Y-m-d H:i:s",time());
       $fromid = $data['fromid'];
       $toid = $data['toid'];
       $content = $data['text'];
       //数据库插入语句
       $db->query("INSERT INTO `message` (fromid,toid,`content`,`time`) VALUES ( '$fromid','$toid', '$content','$time')");
   }



}

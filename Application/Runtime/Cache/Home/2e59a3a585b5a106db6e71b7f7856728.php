<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>总部即时通讯</title>
</head>
<style>
    * {
        border: 0;
        margin: 0;
    }

    body {
        font-family: "Microsoft YaHei", tahoma, arial, "Hiragino Sans GB", "\\5b8bä½“", sans-serif!important;
    }

    .box {
        width: 100%;
        position: absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
    }


    .clearbox::after {
        display: block;
        clear: both;
        visibility: hidden;
        content: '';
        height: 0;
    }

    .content {
        width:100% ;
        height: -moz-calc(100% - 200px);
        height: -webkit-calc(100% -200px);
        height: calc(100% - 200px);
        position: fixed;
        top:0px;
        left:0px;
        bottom: 150px;
        border-bottom: 1px solid #e0e0e0;
        overflow-y: auto;
    }

    .content-box {
        width: 100%;
    }

    .foot {
        width:100%;
        height: 200px;
        position: fixed;
        bottom: 0px;
        left: 0px;
    }

    .foot-one {
        width: 100%;
        height: 30px;
    }

    .ft-left {
        float: left;
    }

    .ft-right {
        float: right;
    }

    .le-ty {
        float: left;
        line-height: 30px;
        margin-left: 20px;
        color: 14px;
    }

    .le-ly {
        line-height: 30px;
        margin-right: 20px;
        color: 14px;
    }

    .layim-textarea {
        display: block;
        width: 98%;
        margin: auto;
        padding: 5px 10px;
        height: 68px;
        line-height: 20px;
        border: none;
        overflow: auto;
        resize: none;
        background: 0 0;
        outline: none;
    }

    .foot-three {
        width: 100%;
        height: 30px;
        position: relative;
    }

    .foot-send {
        position: absolute;
        right:30px;
    }

    .Send {
        font-size: 14px;
        line-height: 32px;
        margin-left: 5px;
        padding: 0 20px;
        background-color: #5FB878;
        color: #fff;
        border-radius: 3px;
        border: 0;
        outline: none;
        cursor: pointer;
    }

    /*内容*/

    .content-box li {
        list-style: none;
        width: 100%;
    }

    .layim-chat-your .layim-chat-user {
        float: left;
        background-color: #e2e2e2;
        color: #000000;
        word-break: break-all;
        display: inline-block;
        margin-left: 10px;
        margin-top: 25px;
        margin-bottom:25px;
        padding: 8px 15px;
        background-color: #e2e2e2;
        border-radius: 3px;
    }

    .layim-chat-mine .layim-chat-user {
        float: right;
        margin-top: 25px;
        padding: 8px 15px;
        background-color: #e2e2e2;
        border-radius: 3px;
        background-color: #5FB878;
        color: #ffffff;
        word-break: break-all;
        display: inline-block;
        margin-bottom:25px;
        margin-right: 10px;
    }

    .fileinput-button {
        position: relative;
        display: inline-block;
        overflow: hidden;
    }

    .fileinput-button input{
        position: absolute;
        right: 0px;
        top: 0px;
    }

    .data-img{
        width: 100px;
        height: 100px;
    }

    .qqFace {
        margin-top: -100px;
        background: #fff;
        padding: 2px;
        border: 1px #dfe6f6 solid;
        top:-28px !important;
    }

    .sp-img {
        width: 10%;
        display: inline-block;
    }
    .sp-img:hover{
        border: 1px #0066cc solid;
    }
</style>

<body>
<div class="box clearbox">
        <!--中间内容-->
        <div class="content">
            <div class="content-box" id="content-box">

                <li class="layim-chat-your clearbox">
                    <div class="layim-chat-user">
                        犯得上发生范德萨<?php echo ($toid); ?>
                    </div>
                </li>
                <li class="layim-chat-mine clearbox">
                    <div class="layim-chat-user">
                        范德萨富士达法师打
                    </div>
                </li>


                <?php if(is_array($data)): foreach($data as $key=>$vo): if($vo["fromid"] == $id): ?><li class="layim-chat-mine clearbox">
                            <div class="layim-chat-user">
                                <?php echo ($vo["content"]); ?>
                            </div>
                        </li>
                        <?php else: ?>
                        <li class="layim-chat-your clearbox">
                            <div class="layim-chat-user">
                                <?php echo ($vo["content"]); ?>
                            </div>
                        </li><?php endif; endforeach; endif; ?>


            </div>
        </div>
        <div class="foot">
            <div class="foot-one clearbox">
                <div class="ft-left">
                    <div class="le-ty emotion">表情</div>
                    <span class="le-ty fileinput-button">
                        <span>上传</span>
                        <input type="file" id="file" name="file" value=""/>
                    </span>
                </div>
                <div class="ft-right">
                    <span class="le-ly">消息记录</span>
                </div>
            </div>
            <div class="foot-two">
                <div class="input layim-textarea" id="saytext" name="saytext" contenteditable="true">

                </div>
            </div>
            <div class="foot-three">
                <div class="foot-send">
                    <button class="Send">发送</button>
                </div>
            </div>
        </div>
    </div>
</body>
<
<script src="/tp3/Public/lib/js/jquery.min.js"></script>
<script type="text/javascript" src="/tp3/Public/lib/js/jquery.qqFace.js"></script>
<script type="text/javascript">
    var id = <?php echo ($id); ?>;
    var toid = <?php echo ($toid); ?>;
    var url = "http://127.0.0.1";
    $('.emotion').qqFace({

        // id : 'facebox',

        assign: 'saytext',

        path: "/tp3/Public/lib/img/arclist/" //表情存放的路径

    });

    // 对象转json
    function stringify(data) {
        return JSON.stringify(data);
    }

</script>
<script src="/tp3/Public/js/home/chat.js"></script>

</html>
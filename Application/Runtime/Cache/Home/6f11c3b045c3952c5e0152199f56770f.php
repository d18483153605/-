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
    .box-one{
        float: left;
        width:180px;
        height:100%;
        border-right:1px solid #e0e0e0;
        background-color: #D9D9D9;
    }
    .box-two{
        float: right;
        width:calc(100%-180px);
        height:100%;
    }
    .clearbox::after {
        display: block;
        clear: both;
        visibility: hidden;
        content: '';
        height: 0;
    }
    .boner{
        height:60px;
        border-bottom:1px solid #e0e0e0;
    }
    .lert-one{
        background-color: #4E5465;
        color:#fff;
        line-height:60px;
        padding-left:10px;
        border-left:5px solid #5FB878;
    }
    .lert-two{
        position: relative;
        line-height:60px;
        padding-left:60px;
        cursor: pointer;
        border-radius:5px;
    }
    .on{
        background-color: #c3c3c3;
    }
    .top-pic{
        width:40px;
        height:40px;
        position:absolute;
        top:10px;
        left:10px;
        border-radius:50%;
    }
    .top-pic img{
        width:100%;
        height:100%;
        border-radius:50%;
    }
    .delect{
        position: absolute;
        right:10px;
        color: red;
        cursor:pointer;
        display:none;
    }
    .lert-two:hover .delect{
        display:inline-block;
    }
    .lert-two:hover{
        background-color: #F3F3F3;
    }
    .content {
        width: -moz-calc(100% - 180px);
        width: -webkit-calc(100% - 180px);
        width: calc(100% - 180px);
        height: -moz-calc(100% - 200px);
        height: -webkit-calc(100% -200px);
        height: calc(100% - 200px);
        position: fixed;
        top:0px;
        left:180px;
        bottom: 150px;
        border-bottom: 1px solid #e0e0e0;
        overflow-y: auto;
    }

    .content-box {
        width: 100%;
    }
    .body{
        width: -moz-calc(100% - 185px);
        width: -webkit-calc(100% - 185px);
        width: calc(100% - 185px);
        border:1px solid;
        height:98%;
        float: right;
    }
    .foot {
        width: -moz-calc(100% - 180px);
        width: -webkit-calc(100% - 180px);
        width: calc(100% - 180px);
        height: 200px;
        position: fixed;
        bottom: 0px;
        left: 180px;
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
</style>

<body>
<div class="box clearbox">
    <div class="box-one">
        <div class="boner lert-one">
            正在咨询的会员
        </div>
        <?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="boner lert-two" data-url="/tp3/home/index/central?fromid=<?php echo ($id); ?>&toid=<?php echo ($vo['fromid']); ?>">
                <span><?php echo ($vo['name']); ?></span>
                <span class="delect">X</span>
                <div class="top-pic">
                    <img src=""/>
                </div>
            </div><?php endforeach; endif; ?>

    </div>
    <div class="body" id="body">

    </div>
</div>
</body>
<script src="/tp3/Public/js/home/jquery.js"></script>
<script type="text/javascript">
    var id = <?php echo ($id); ?>;
    $(".lert-two").click(function () {
        var url = $(this).attr("data-url");
        var str = '<iframe src='+url+' frameborder="0" id="demoAdmin" style="width: 100%; height: 98%;"></iframe>';
        $(".lert-two").css("background-color","#D9D9D9");
        $(this).css("background-color","#F3F3F3");
        $("#body").html(str);
    });
</script>
<script src="/tp3/Public/js/home/chat.js"></script>
</html>
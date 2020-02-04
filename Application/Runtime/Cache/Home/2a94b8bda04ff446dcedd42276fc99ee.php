<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>WebSocket客服</title>
    <link rel="stylesheet" href="/tp3/Public/layui/css/layui.css">
    <style>
        .lost{
            height: 40px;
            /*text-align: center;*/
            line-height: 40px;
            color: #fff;
            font-style: normal;
            cursor: pointer;
            padding-left: 20px;
        }
    </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <!--<ul class="layui-nav layui-layout-left">-->
            <!--<li class="layui-nav-item"><a href="">控制台</a></li>-->
            <!--<li class="layui-nav-item"><a href="">商品管理</a></li>-->
            <!--<li class="layui-nav-item"><a href="">用户</a></li>-->
            <!--<li class="layui-nav-item">-->
                <!--<a href="javascript:;">其它系统</a>-->
                <!--<dl class="layui-nav-child">-->
                    <!--<dd><a href="">邮件管理</a></dd>-->
                    <!--<dd><a href="">消息管理</a></dd>-->
                    <!--<dd><a href="">授权管理</a></dd>-->
                <!--</dl>-->
            <!--</li>-->
        <!--</ul>-->
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">所有商品</a>
                    <dl class="layui-nav-child">
                        <dd><div class="lost" data-id="3" data-url="/tp3/home/index/chatindex?id=3">客服三</div></dd>
                        <dd><div class="lost" data-id="4"  data-url="/tp3/home/index/chatindex?id=4">客服四</div></dd>
                    </dl>
                </li>

            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div class="bn-con" style="padding: 15px; width:100%; height:100%;" >

        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="/tp3/Public/layui/layui.js"></script>
<script src="/tp3/Public/js/home/jquery.js"></script>

<script>

    $(function () {
        $(".lost").click(function () {
            var url = $(this).attr("data-url");
            var str = '<iframe src='+url+' frameborder="0" id="demoAdmin" style="width: 100%; height: 98%;"></iframe>';
            $(".lost").css("background-color","#23262E");
            $(this).css("background-color","#009688");
            $(".bn-con").html(str);
        });
    })
</script>
<!--<script src="/tp3/Public/js/home/chat.js"></script>-->
</body>
</html>
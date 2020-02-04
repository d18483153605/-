
var fromid = id;    // 客服id
var toid = toid;    // 用户id

if(fromid){
    var message = {};
    var ws =  new WebSocket("ws://192.168.1.182:8283");
    message['fromid'] = fromid;
    ws.onopen = function (e) {
        console.log("连接成功");
        // 成功绑定id
        message['type'] = "bind";
        var onopen = stringify(message);
        ws.send(onopen);
        if(toid){
            // 判断用户是否在线
            message['type'] = "isUid";
            message['toid'] = toid;
            var isUid = stringify(message);
            ws.send(isUid);
        }
    };

    $(".Send").click(function () {
        var txt = $(".layim-textarea").html();
        console.log(txt);

        if(txt){
            // 发送消息
            message['type'] = "say";
            message['text'] = txt;
            var data = stringify(message);
            ws.send(data);
        }
    });


    ws.onmessage = function (ev) {
        var data = JSON.parse( ev.data );
        switch (data.type){
            case "init" :

                return;
            // 接收自己发送的消息
            case "say_fromid" :
                // 判断返回信息的客服id是否相等
                if(data.toid == toid){
                    var str = '<li class="layim-chat-mine clearbox"><div class="layim-chat-user">'+data.text+'</div></li>';
                    $("#content-box").append(str);
                }
                return;

            // 接收用户发送的消息
            case "say_toid" :

                // 判断发送消息的用户id是否相等
                if(data.fromid == toid){
                    var tostr = '<li class="layim-chat-your clearbox"><div class="layim-chat-user">'+data.text+'</div></li>';
                    $("#content-box").append(tostr);
                }

                return;
        }
    }
}
function isUid() {

}




// 对象转json
function stringify(data) {
    return JSON.stringify(data);
}
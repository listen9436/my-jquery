function ajax(method,url,date,fun){
    //创建请求对象
    var xhr = null;

    if(window.XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2  连接服务器
    //3  发送请求
    if(method.toLowerCase() == "get"){
        xhr.open("get",url+"?"+date,true);
        xhr.send();
    }else{
        xhr.open("post",url,true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send(date);
    }
    //4 处理服务器 响应结果
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status ==200){
                fun(xhr.responseText);
            }else{
                if(fun){
                    fun(xhr.status);
                }
            }
        }
    }
}

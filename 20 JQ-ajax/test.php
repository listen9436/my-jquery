<?php
//设置页面的内容为html编码格式是utf-8；
header("Content-Type:text/plain;charset=utf-8");
//定义一个多维数组，包含公司信息，每条员工信息为一个数组
$feicui=array
(
    array("name"=>"范总","number"=>"201","sex"=>"女","job"=>"总经理"),
    array("name"=>"麻老师","number"=>"202","sex"=>"女","job"=>"经理"),
    array("name"=>"光老师","number"=>"203","sex"=>"女","job"=>"班主任"),
    array("name"=>"李老师","number"=>"204","sex"=>"女","job"=>"就业老师"),
    array("name"=>"高薄溅","number"=>"205","sex"=>"不详","job"=>"看门狗")
);
//判断如果是get请求，则进行搜索，如果是post请求，则进行新建
//$_SERVER是一个全局变量，在一个脚本的全部作用域都可用
//$_SERVER["REQUEST_METHOD"]返回访问页面使用的请求方法
if($_SERVER["REQUEST_METHOD"]=="GET"){
    search();
}elseif($_SERVER["REQUEST_METHOD"]=="POST"){
    create();
}
function search(){
  //isset检测变量是否设置；empty判断值是否为空；
  //超全局变量$_GET["number"]和$_POST["number"]用于接收表单数据
  if(!isset($_GET["number"])||empty($_GET["number"])){
    echo "参数错误";
    return;
  }
  //函数之外声明的变量拥有global作用域，只能在函数以外进行访问
  //global关键词用于访问函数内部的全部变量
  global $feicui;
  //获取number参数
  $number = $_GET["number"];
  $result = "没有找到员工";
  //遍历$staff多为数组

  foreach ($feicui as $value) {
    if($value["number"]==$number){
      $result="员工编号:".$value["number"]."<br>姓名:".$value["name"]."<br>性别:".$value["sex"]."<br>职位:".$value["job"];
    break;
    }
  }
  echo $result;
}
//创建员工
  function create(){
    //判断信息是否填写完全
    if(!isset($_POST["name"])||empty($_POST["name"])
      ||!isset($_POST["number"])||empty($_POST["number"])
      ||!isset($_POST["sex"])||empty($_POST["sex"])
      ||!isset($_POST["job"])||empty($_POST["job"])){
      echo "保存失败，员工信息填写不全";
      return;
    }
    echo"员工".$_POST["name"]."信息保存成功";
  }
?>
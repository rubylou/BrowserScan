<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Browser &middot; Scan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="__PUBLIC__/detectsources/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/detectsources/flat-ui.css" rel="stylesheet">
    <script src="__PUBLIC__/detectsources/jquery.js"></script>
    <script scr="__PUBLIC__/detectsources/bootstrap.js"></script>
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Main marketing message and sign up button */
    
      .login-screen .btn {
        font-size: 21px;
        padding: 14px 24px;
        color: #ffffff;
        background-color: #428bca;
        border-color: #357ebd;
        margin-top: 8px;
      }

      .jumbotron .login-icon {
        margin-left: 15%;
        margin-top: 8%;
      }

      .login-form {
        margin-left: 20%;
        margin-right:20%;
      }

       .container .jumbotron {
        margin: 0 auto;
        max-width: 800px;
        color: #ffffff;
        background-color: #428bca;
        border-color: #357ebd;
      }

      h4,
      input{
        font-family: Microsoft YaHei;
      }
    </style>
  </head>

  <body> 
    <div class="container">
      <div class="jumbotron">
        <h4><img src="__PUBLIC__/detectsources/search.png"/>Browser Scan <small>Admin</small></h4>
        <div class="login-form">
          <form method="post" id="loginForm">
            <div class="control-group">
              <input type="text" name="user" class="login-field form-control" placeholder="Enter your name" id="login-name">
            </div>

            <div class="control-group">
              <input type="password" name="pwd" class="login-field form-control" placeholder="Password" id="login-pass">
            </div>

            <div class="control-group">
              <div class="text-center">
                  <input type="button" value="登录" class="btn btn-info" onClick="mySubmit()"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
  <script src="__PUBLIC__/detectsources/public_collect.js"></script>
  <script src="__PUBLIC__/detectsources/aes.js"></script>
  <script>
    function mySubmit(){
      //var form = document.getElementById("loginForm");
      //form.action = '__URL__/resultview';
      //form.submit();
      //alert($("#login-name").val()+$("#login-pass").val());
      var xmlHttp = createRequest();
      var user = $("#login-name").val();
      var pwd = $("#login-pass").val();
      request(xmlHttp,'user='+user+'&pwd='+pwd+'&','__URL__/login');
      window.location.href="__URL__/resultview";
    }
  </script>
</html>
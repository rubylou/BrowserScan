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
    <script scr="__PUBLIC__/detectsources/bootstrap.js"></script>
  </head>

  <body>
    <div class="login">
      <div class="login-screen">
        <h4>Welcome to <small>Browser Scan Monitor</small></h4>
          <div class="login-icon">
            <img src="__PUBLIC__/detectsources/Compas.png"/>
          </div>

          <div class="login-form">
            <form method="post" id="loginForm">
              <div class="control-group">
                <input type="text" name="user" class="login-field form-control" placeholder="Enter your name" id="login-name">
              </div>

              <div class="control-group">
                <input type="password" name="pwd" class="login-field form-control" placeholder="Password" id="login-pass">
              </div>

              <div class="control-group">
                <input type="submit" value="Login" class="btn btn-primary btn-block" onClick="javascript:this.form.action='__URL__/resultview';this.form.submit()"/>
              </div>
            </form>
          </div>
      </div>
    </div>
  </body>

</html>
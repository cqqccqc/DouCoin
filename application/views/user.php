<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>欢迎来到DouCoin!</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url().'css/bootstrap.css'?>" rel="stylesheet">
    <!-- custom css -->
    <link href="<?=base_url().'css/user.css'?>" rel="stylesheet">


  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="<?=base_url()?>">DouCoin</a>
        </div>
        <div class="navbar-collapse collapse">
        <?php if (isset($_SESSION['uid'])){?>
          <form class="navbar-form navbar-right" action="<?=base_url().'index.php/login/logout' ?>" method="post" >
            <div class="form-group">
              <a href="<?=base_url().'index.php/user/index/'?><?=$_SESSION['uid']?>" class="form-control"><?=$_SESSION['email']?></a>
            </div>
            <input type="submit" class="btn btn-success" value="登出">
          </form>
          <?php }else {?>
          <form class="navbar-form navbar-right" action="<?=base_url().'index.php/login' ?>" method="post" >
            <div class="form-group  <?php if (isset($error)) echo 'has-error'?>">
              <input type="text" placeholder="<?php if (isset($error)) echo $error; else echo '邮箱'?>"
               class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="密码" class="form-control" name="spwd">
            </div>
            <input type="submit" class="btn btn-success" value="登陆">
          </form>
          <?php }?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row">
        <table class="table">
          <tr>
            <td>用户编号</td>
            <td class="text-muted"><?=$user['uid']?></td> 
            <td class="text-muted">不能修改</td>                     
          </tr>
          <tr>
            <td>邮箱地址</td>
            <td class="text-muted"><?=$user['email']?></td> 
            <td class="text-muted">不能修改</td>   
          </tr>
          <tr>
            <td>登陆密码</td>
            <td><button id="spwd_btn" class="btn btn-primary">修改</button></td>
            <td>
              <form id="spwd" method="post" action="<?=base_url().'index.php/user/edit_spwd'?>">
                <input class="form-control" placeholder="原登陆密码" name="ospwd"><input class="form-control" placeholder="新密码" name="nspwd">
                <input class="form-control" placeholder="确认密码" name="cspwd"><input type="submit" class="btn btn-warning">
              </form>
            </td>
           
          </tr>
          <tr>
            <td>交易密码</td>
            <td><button id="tpwd_btn" class="btn btn-primary">修改</button> </td>
            <td>
              <form id="tpwd" method="post" action="<?=base_url().'index.php/user/edit_tpwd'?>">
                <input class="form-control" placeholder="原交易密码" name="otpwd"><input class="form-control" placeholder="新密码" name="ntpwd">
                <input class="form-control" placeholder="确认密码" name="ctpwd"><input type="submit" class="btn btn-warning">
              </form>
            </td>
                    
          </tr>
        </table>
      </div>
    
  

      <footer>
	      <hr>
    	  <p>&copy; 有关部门</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url().'js/jquery-1.11.0.min.js'?>"></script>
    <script src="<?=base_url().'js/bootstrap.min.js'?>"></script>
    <script>
      $(document).ready(function(){
        $('#spwd').hide();
        $('#tpwd').hide();

        $('#spwd_btn').click(function(){
          $('#spwd').slideToggle(600);
        });
        $('#tpwd_btn').click(function(){
          $('#tpwd').slideToggle(600);
        });
    });
    </script>
  </body>
</html>

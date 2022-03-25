<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Login Form | CodingLab</title> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
            *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
            }
            body{
            background: #fff;
            overflow: hidden;
            }
            ::selection{
            background: rgba(26,188,156,0.3);
            }
            .container{
            max-width: 440px;
            padding: 0 20px;
            margin: 170px auto;
            }
            .wrapper{
            width: 100%;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
            }
            .wrapper .title{
            height: 90px;
            background: #efefef;
            border-radius: 5px 5px 0 0;
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .wrapper form{
            padding: 30px 25px 25px 25px;
            }
            .wrapper form .row{
            height: 45px;
            margin-bottom: 15px;
            position: relative;
            }
            .wrapper form .row input{
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 60px;
            border-radius: 5px;
            border: 1px solid lightgrey;
            font-size: 16px;
            transition: all 0.3s ease;
            }
            form .row input:focus{
            border-color: #ee9d3e;
            box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
            }
            form .row input::placeholder{
            color: #999;
            }
            .wrapper form .row i{
            position: absolute;
            width: 47px;
            height: 100%;
            color: #fff;
            font-size: 18px;
            background: #ee9d3e;
            border: 1px solid #ee9d3e;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .wrapper form .pass{
            margin: -8px 0 20px 0;
            }
            .wrapper form .pass a{
            color: #ee9d3e;
            font-size: 17px;
            text-decoration: none;
            }
            .wrapper form .pass a:hover{
            text-decoration: underline;
            }
            .wrapper form .button input{
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            padding-left: 0px;
            background: #ee9d3e;
            border: 1px solid #ee9d3e;
            cursor: pointer;
            }
            form .button input:hover{
            background: #b96e17;
            }
            .wrapper form .signup-link{
            text-align: center;
            margin-top: 20px;
            font-size: 17px;
            }
            .wrapper form .signup-link a{
            color: #ee9d3e;
            text-decoration: none;
            }
            form .signup-link a:hover{
            text-decoration: underline;
            } 
            .login_sess_message {
                background: #ffb1b1;
                padding: 10px;
                text-align: center;
                color: #fff;
                position: relative;
                border-radius: 3px;
            }
            .success_message {
                background: green;
                padding: 10px;
                text-align: center;
                color: #fff;
                position: relative;
                border-radius: 3px;
            }
            span.close {
                position: absolute;
                top: 0;
                right: 5px;
            }
    </style>
  </head>
  <body>
  <?php
      $site_settings = $this->crud_model->get_where_single('site_settings',array('status'=>'1')); 
  ?>
    <div class="container">
      <div class="wrapper">
          <?php if($this->session->flashdata('loginfirst')){?>
            <div class="login_sess_message">
                <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
                <?php echo $this->session->flashdata('loginfirst'); ?>
            </div>
           <?php } ?>
           <?php if($this->session->flashdata('error')){?>
            <div class="login_sess_message">
                <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
           <?php } ?>
           <?php if($this->session->flashdata('success')){?>
            <div class="success_message">
                <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
           <?php } ?>  
        <div class="title">
            <div class="loginlogo"><img src="<?php echo $site_settings->logo ?>" /></div>
            <!-- <span>Shine Traders</span> -->
        </div>
        <form action="<?php echo base_url('login') ?>" method='post'>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" name="submit" value="Login">
          </div>
          <!-- <div class="signup-link">Not a member? <a href="#">Signup now</a></div> -->
        </form>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document).off('click','.close').on('click','.close',function(e){
                $(this).parent().remove();
            });
        });
    </script>

  </body>
</html>

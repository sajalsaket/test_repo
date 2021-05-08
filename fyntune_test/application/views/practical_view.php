<head>
	<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<link rel="shortcut icon" href="<?php echo base_url() ?>images/favicon.png">

<title>Machine Test </title>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor.bundle.css?ver=192">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-lavender.css?ver=192" id="changeTheme">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme.css?ver=192">
</head>
<div class="col-xs-12">
        <div class="text-center">
        <h2>
       Welcome        
   </h2>
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                        <label>Please Login or Continue as Guest</label>
      <hr>
    
             <li id='log' class="GFG"><a class="menu-link nav-link" href="<?php echo base_url() ?>practical/login">Login</a></li>
            <li id='gue' class="GFG"><a class="menu-link nav-link" href="<?php echo base_url() ?>practical/register">SignUp ?</a></li>
           <hr>
           <h5>OR</h5>
           <hr>
           <li id='gue' class="guest"><a class="menu-link nav-link" href="<?php echo base_url() ?>practical/home">Proceed as Guest User</a></li>
            </div>
   </div>
</div>                    
    <script src="<?php echo base_url() ?>assets/js/jquery.bundle.js?ver=192"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js?ver=192"></script>
    <script src="<?php echo base_url() ?>assets/js/charts.js"></script>


    <style>
        .GFG {
            background-color: white;
            border: 2px solid black;
            color: green;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            position: relative;
        }

        .guest{
            background-color: white;
            border: 2px solid black;
            color: green;
            padding: 5px 100px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            position: relative;
        }
    </style>
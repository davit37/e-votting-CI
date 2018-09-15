<!DOCTYPE html>
<html>
<head>
	<title> E-Voting</title>
	<link rel="shortcut icon" href="http://www.pnb.ac.id/wp-content/uploads/2016/12/Logo-Politeknik-Negeri-Bali-tranpasaran-cupu-putih-100.png" type="image/x-icon">
	
	<!--Import materialize.css-->
	 <link rel="stylesheet" href="<?php echo base_url();?>assets/materialize/css/materialize.min.css">
	 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/circle.css">
      <!-- Sweet Alert CSS import-->

    <style type="text/css">
    	  body {
			    display: flex;
			    min-height: 100vh;
			    flex-direction: column;
					background-color: #eee;
			  }

  			main {
			    flex: 1 0 auto;
			  }


			tr:nth-last-child(even){
				background-color: #E4F1FE;

			}
			.tengah{
                  height: 80%;
                  width: 80%;
                  margin: 0 auto;
              }
              .rapi{
                  height: 100%;
                  width: 100%;
                  margin-left: 12em;
              }
    </style>
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.css">
	
   
 
</head>
<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
  <script src="<?php echo base_url();?>assets/materialize/js/materialize.min.js"></script>
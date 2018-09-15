<!DOCTYPE html>
<html>

<head>
	<title> E-Voting</title>
	<link rel="shortcut icon" href="http://www.pnb.ac.id/wp-content/uploads/2016/12/Logo-Politeknik-Negeri-Bali-tranpasaran-cupu-putih-100.png"
	    type="image/x-icon">


	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.clockpicker.css" />
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/circle.css">



	<!-- Sweet Alert CSS import-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.css">
	<style type="text/css">
		body {
			background-color: #EEEEEE;
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}

		main {
			flex: 1 0 auto;
		}


		tr:nth-last-child(even) {
			background-color: #E4F1FE;
		}
	</style>
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<?php
    	if(isset($this->session->userdata['logged_in'])){
    		$id_user = ($this->session->userdata['logged_in']['username']);
    		$nama = ($this->session->userdata['logged_in']['nama']);
    		$name = ($this->session->userdata['logged_in']['gambar']);
    	}
    	else {
		header("location: login");
		}
    ?>
</head>

<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/sweetalert2.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="<?php echo base_url();?>assets/materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.clockpicker.js"></script>

	<!--Start Navbar E-Voting PNB-->
	<main>
		<nav>
			<div class="nav-wrapper cyan lighten-1">
				<div class="container #1976d2 blue darken-2">

					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li><a href="<?php echo site_url('Admin');?>" class="valign-wrapper">
					<i class="fa fa-home fa-2x " style="margin-right:5px;"> </i><span></span> </a></li>
						<li><a href="<?php echo site_url('Admin/vkandidat');?>">Data kandidat</a></li>
						<li><a href="<?php echo site_url('Admin/daftar_user');?>">Data user</a></li>
					</ul>

					<ul class="right hide-on-med-and-down">

						<li><a href="<?php echo site_url('Admin/startvoting');?>" class="valign-wrapper">
					<i class="fa fa-power-off fa-2x" style="margin-right:5px;"> </i><span></span> Start Voting</a></li>
						<li>
							<a class="dropdown-button valign-wrapper" href="#!" data-activates="dropdown1" data-beloworigin="true">
								<?php
          				$image = base_url();
          				$path = "pictures/";
          				$properti = array(
		                        'src' => $image.$path.$name,
		                        'width' => '50',
		                        'height'=> '50',
		                        'class'	=> 'circle'
				                      );
				                  echo img($properti);
				                  echo "&nbsp &nbsp &nbsp";
				                  echo $nama;
		          				?>
									<i class="fa fa-chevron-down  right" style="margin-left:15px;"></i></a>
							<ul id='dropdown1' class='dropdown-content' href="#!" data-activates="dropdown1" data-beloworigin="true">
								<li><a href="<?php echo site_url('admin/user_akun?id='.$id_user)?>" class="blue-text">Edit Profile</a></li>
								<li><a href="<?php echo site_url('user')?>" class="blue-text">Login As User</a></li>
								<li><a href="<?php echo site_url('login/logout')?>" class="blue-text">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<style type="text/css">
			::-webkit-scrollbar {
				width: 15px;
			}

			::-webkit-scrollbar-button {
				/* 2 */
			}

			::-webkit-scrollbar-track {}

			::-webkit-scrollbar-track-piece {
				/* 4 */
			}

			::-webkit-scrollbar-thumb {
				-webkit-box-shadow: inset 0 0 15px rgb(52, 152, 219);
			}

			::-webkit-scrollbar-corner {
				/* 6 */
			}

			::-webkit-resizer {
				/* 7 */
			}
			.tabs.tabs-fixed-width{
					overflow-x:hidden;
					}
		</style>

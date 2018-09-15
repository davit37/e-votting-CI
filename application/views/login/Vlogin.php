<?php include('Header.php'); ?>
	
			<?php echo form_open()?>
			<div class="login-page">
			  <div class="form">
				
				<form class="login-form">
					<p class='judul'>Username</p>
					<input id="username" type="text" class="input username" name="username">

					<p class='judul'>Password</p>
					<input id="password" type="password" class="input password" name="password">
				 	
					<button class="submit1"name="login">Log In</button>
				  <p class="message">Silahkan Login</p>
				
				
			</div>
			</div>		
			<?php echo form_close()?>
		
	<script>
		$('.message a').click(function(){
			$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
			$(".submit1").click(function(event) {
			event.preventDefault();
			var username		= $("#username").val();
			var password	= $("#password").val();
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>"+"index.php/login/check_login",
			dataType: 'json',
			data: {username:username, password:password},
			success: function(res) {
				if(res.hasil == 'a'){
					window.location.href = "<?php echo site_url('Admin');?>";
				}else if(res.hasil == 'u'){
					swal({
						title: "Login Gagal",
						text: "Anda tidak memiliki akses ! ",
						showConfirmButton: true,
						confirmButtonColor: '#0760ef',
						type:"error"});

				}else if(res.hasil == 'p'){
					window.location.href = "<?php echo site_url('Pimpinan');?>";

				}
				else{
					swal({
						title: "Login Gagal",
						text: "Pastikan id_user dan Password Benar",
						showConfirmButton: true,
						confirmButtonColor: '#0760ef',
						type:"error"});
				}
			}
		});
	});
});
</script>


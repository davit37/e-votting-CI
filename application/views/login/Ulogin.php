<?php include('Header.php'); ?>
	
			<?php echo form_open()?>
			<div class="login-page">
			  <div class="form">
				
				<form class="login-form">
					<p class='judul'>Nik</p>
					<input id="nik" type="text" class="input username" name="Nik">

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
			var nik		= $("#nik").val();
			var password	= $("#password").val();
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>"+"index.php/login/cek_login_user",
			dataType: 'json',
			data: {nik:nik, password:password},
			success: function(res) {
				if(res.hasil == 'true'){
					window.location.href = "<?php echo site_url('User');?>";
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


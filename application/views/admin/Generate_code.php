<?php include('Header.php');?>
<?php foreach($hitung as $data){
		$max_no=$data->id_user;
		}
	
 ?>
<div class='container'>
	<div class="row">

		<div class="col s5 offset-s3">
			<div class="card">
				<div class="card-content">
					<?php echo form_open();  ?>
					<?php echo validation_errors(); ?>
					<button type="button" class="waves-effect waves-light btn light-blue accent-3" style="width:20px; padding-left:10px; margi:5px 15px; float:right;"
					    onclick="back()"><i class="fa fa-close white-text" style="padding:1px"></i></button>
					<div class="row">
						<div class="input-field col s12">
							<i class=" prefix"><i class="fa fa-user-o"></i></i>
							<input id="nik" type="number" class="validate" name="nik" required>
							<label for="nik">Nik</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class=" prefix"><i class="fa fa-user-o"></i></i>
							<input id="username" type="text" class="validate" name="username" required>
							<label for="nik">Username</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class=" prefix"><i class="fa fa-key"></i></i>
							<input id="pass" type="text" class="validate" name="password" >
							<label for="nik">Password</label>

						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class=" prefix"><i class="fa fa-vcard-o"></i></i>
							<input id="nama" type="text" class="validate" name="nama">
							<label for="nama">Nama</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<i class=" prefix"><i class="fa fa-child"></i></i>
							<input id="tanggal_lahir" type="date" class="datepicker" name="tanggal_lahir">
							<label for="tanggal_lahir">tanggal lahir</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class=" prefix"><i class="fa fa-flag"></i></i>
							<input id="alamat" type="text" class="validate" name="alamat" required>
							<label for="alamat">alamat</label>
						</div>
					</div>
					<div class="row">
						
							
							<p>Hak akses :</p>
						
					</div>
					

					
					<div class="row">

						<p style="margin-left: 10px" class="user">
							
							<input name="user" type="radio" id="test1" value="a" />
							<label for="test1">Admin</label>
							<input name="user" type="radio" id="test2" value="u" checked/>
							<label for="test2">Pemilih</label>
							<input name="user" type="radio" id="test3" value="p" />
							<label for="test3">Pimpinan</label>

						</p>
					</div>
					<button type="Submit" class="waves-effect waves-light btn light-blue accent-3 submit">Submit</button>

				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	function back() {
		window.location.href = "<?php echo site_url('admin/daftar_user'); ?>";
	}
</script>

<script type="text/javascript">
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: true,
		
		// Creates a dropdown of 15 years to control year
	});
</script>

<script type="text/javascript">
	
	// $(document).ready(function(){
	// 	$(window).load(function(){
	// 		var code=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
	// 		'A','B','C','D','F','G','F','H','J','I','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
	// 		'0','1','2','3','4','5','6','7','8','9'];
	// 		var h='';
	// 		for (var i =0;i<=5;i++){
	// 			var acak= Math.floor(Math.random()*62);
	// 			h+=code[acak];
	// 		}


			

	// 		$('#pass').val(h)
	// 	})
	// })
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".submit").click(function (event) {
			event.preventDefault();
			var nik = $("#nik").val();
			var username = $("#username").val();
			var nama = $("#nama").val();
			var tanggal_lahir = $('input[name=tanggal_lahir]').val();
			var alamat = $('#alamat').val();
			var password = $("#pass").val();
			var akses = $('.user input[type="radio"]:checked:first').val();
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/admin/tambah_user",
				dataType: 'json',
				data: {
					nik: nik,
					username : username,
					nama: nama,
					tanggal_lahir: tanggal_lahir,
					alamat: alamat,
					password: password,
					user: akses
				},
				success: function (res) {
					if (res.hasil == 'true') {
						swal({
								title: "Sukses",
								text: "Data Di Tambahkan",
								showConfirmButton: true,
								confirmButtonColor: '#0760ef',
								type: "success"
							}).then(function(){
								window.location.href = "<?php echo site_url('admin/generate_code'); ?>";
							})
					} else if (res.hasil == 'false') {
						swal({
								title: "Gagal",
								text: "Data sudah ada :'(",
								showConfirmButton: true,
								confirmButtonColor: '#0760ef',
								type: "error"
							}).then(
							function () {
								document.getElementById("username").value = "";
								document.getElementById("nik").value = "";
							});
					}else if (res.hasil == 'kosong') {
						swal({
								title: "Gagal",
								text: "Semua data user harus di isi ",
								showConfirmButton: true,
								confirmButtonColor: '#0760ef',
								type: "error"
							});
					}
				}
			});
		});
	});
</script>
<?php include('Footer.php');?>
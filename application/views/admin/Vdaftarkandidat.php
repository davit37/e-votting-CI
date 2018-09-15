<?php include('Header.php');?>
<?php foreach($no as $data){
		$max_no=$data->no_max+1;
		}
		
		
 ?>
<div class="row">
	<div class="container">
		<div class="card-panel">
			<h5 class="center">Daftar Kandidat</h5>
			<div class="row">

				<div class="col s8 offset-s2">
					<ul class="tabs tabs-fixed-width ">
						<li class="tab col s3">
							<a href="#profile">Walikota</a>
						</li>
						<li class="tab col s3">
							<a href="#info">Wakil</a>
						</li>

						<li class="tab col s3">
							<a href="#visi_misi">Visi Misi</a>
						</li>
						<li class="tab col s3">
							<a href="#foto">foto </a>
						</li>

					</ul>
					<?php echo form_open();  ?>
					<?php echo validation_errors(); ?>
					<div id="profile">
						<div class="card sticky-action">
							<div class="card-action">
								<div class="row">

									<input id="jabatan" type="hidden" class="validate" name="jabatan" value="Walikota" readonly>


									<div class="input-field col s12">
										<input id="no_kandidat" type="number" class="validate" value="<?php echo $max_no; ?>" readonly name="no_kandidat">
										<label for="icon_prefix">No Kandidat</label>
									</div>
									<div class="input-field col s12">

										<i class=" prefix">
											<i class="fa fa-id-card-o"></i>
										</i>
										<input id="nik" type="text" class="validate" name="nik">
										<label for="icon_prefix">Nik Kandidat</label>
									</div>

									<div class="input-field col s12">

										<i class=" prefix">
											<i class="fa fa-user-o"></i>
										</i>
										<input id="nama_kandidat" type="text" class="validate" name="nama_kandidat">
										<label for="icon_prefix">Nama Kandidat</label>
									</div>
									<div class="input-field col s12">

										<i class=" prefix">
											<i class="fa fa-car"></i>
										</i>
										<input id="alamat" type="text" class="validate" name="alamat">
										<label for="icon_prefix">Alamat</label>
									</div>



								</div>
							</div>
							<div class="center card-action">
								<button id="button1" class="btn waves-effect waves-light light-blue lighten-1 submit1" type="submit" name="action">Daftar
								</button>
							</div>
						</div>

					</div>
					<?php echo form_close(); ?>

					<?php echo form_open();  ?>

					<div id="info">
						<div class="card sticky-action">
							<div class="card-action">
								<div class="row">
									<div class="input-field col s12">
										<input id="no_wakil" type="number" class="validate" name="no_wakil" value="<?php echo $max_no; ?>" readonly>
										<label for="icon_prefix">No Kandidat</label>
									</div>

									<div class="input-field col s12">

										<i class=" prefix">
											<i class="fa fa-id-card-o"></i>
										</i>
										<input id="nik_wakil" type="text" class="validate" name="nik_wakil">
										<label for="icon_prefix">Nik Wakil</label>
									</div>
									<div class="input-field col s12">

										<i class=" prefix">
											<i class="fa fa-user-o"></i>
										</i>
										<input id="nama_wakil" type="text" class="validate" name="nama_wakil">
										<label for="icon_prefix">Nama Wakil</label>
									</div>
									<div class="input-field col s12">

										<i class=" prefix">
											<i class="fa fa-car"></i>
										</i>
										<input id="alamat_wakil" type="text" class="validate" name="alamat_wakil">
										<label for="icon_prefix">Alamat</label>
									</div>


									<input id="jabatan_wakil" type="hidden" class="validate" name="wakil" value="Wakil Walikota" readonly>



								</div>
							</div>
							<div class="center card-action">
								<button class="btn waves-effect waves-light light-blue lighten-1 submit2" type="submit" name="action">Daftar
								</button>
							</div>
						</div>

					</div>
					<?php echo form_close(); ?>

					<?php echo form_open();  ?>

					<div id="visi_misi">
						<div class="card sticky-action">
							<div class="card-action">
								<div class="row">
									<div class="input-field col s12">
										<i class=" prefix">
											<i class="fa fa-user-o"></i>
										</i>
										<input id="no" type="number" class="validate" name="no" value="<?php echo $max_no;?>" readonly>
										<label for="no">No Kandidat</label>
									</div>
									<div class="input-field col s12">
										<textarea id="visi" class="materialize-textarea" name="visi"></textarea>
										<label for="visi">Visi</label>
									</div>
									<div class="input-field col s12">
										<textarea id="misi" class="materialize-textarea" name="misi"> </textarea>
										<label for="misi">Misi</label>
									</div>

								</div>
							</div>
							<div class="center card-action">
								<button class="btn waves-effect waves-light light-blue lighten-1 submit3" type="submit" name="action">Tambah
								</button>
								<button class="btn waves-effect waves-light light-blue lighten-1" type="reset" name="action">Cancel
								</button>
							</div>
						</div>

					</div>
					<?php echo form_close();?>


					<div id="foto">
						<?php echo form_open_multipart('admin/tambah_photo');?>
						<div class="card sticky-action">
							<div class="card-action">
								<div class="input-field col s12">
									<i class=" prefix">
										<i class="fa fa-user-o"></i>
									</i>
									<input id="no" type="number" class="validate" name="no" value="<?php echo $max_no;?>" readonly>
									<label for="no">No Kandidat</label>
								</div>
								<div class="row">

									<div class="col s6">
										<div class="file-field input-field">
											<div class="btn light-blue lighten-1">
												<span>File</span>
												<input type="file" name="imgName" onchange="loadFile(event)">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text" name="imgName" onchange="loadFile(event)">
											</div>
										</div>
										<div class="center">
											<button class="btn waves-effect waves-light light-blue lighten-1 " type="submit" name="action">Tambah
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php echo form_close(); ?>
					</div>


				</div>

			</div>
		</div>
	</div>
	<script>
		var wakil = document.querySelector("li a[href='#info']");
		console.log(wakil);
	</script>
	<script>
		var getButton = document.getElementById('button1');

		function tampilkan(e) {
			var tagetTab = e.target.getAttributId('id');
			if (targetTab == 'button1') {
				window.location.hash = $active.attr('href');
			}
		}

		getButton.addEventListener("click", tampilkan);
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('select').material_select();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".submit1").click(function (event) {
				event.preventDefault();
				var nik = $("#nik").val();
				var jabatan = $("#jabatan").val();
				var no_kandidat = $("#no_kandidat").val();
				var nama_kandidat = $("#nama_kandidat").val();
				var alamat = $("#alamat").val();
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/admin/tambah_kandidat",
					dataType: 'json',
					data: {
						nik: nik,
						jabatan: jabatan,
						no_kandidat: no_kandidat,
						nama_kandidat:nama_kandidat,
						alamat:alamat
					},
					success: function (res) {
						if (res.hasil == 'true') {
							swal({
									title: "simpan Sukses",
									text: "Data Berhasil di simpan",
									showConfirmButton: true,
									confirmButtonColor: '#29b6f6',
									type: "success"
								}

							).then(function () {
								$('#nik').attr('disabled','disabled')
								$('#nama_kandidat').attr('disabled','disabled')
								$('#alamat').attr('disabled','disabled')
								$('.submit1').attr('disabled','disabled');
							})

						} else if (res.hasil == 'false') {
							swal({
								title: "Gagal",
								text: "Duplicate Entry :'(",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "error"
							});
						} else if (res.hasil == 'id_kosong') {
							swal({
								title: "Gagal",
								text: "id kosong di isi:'(",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "error"
							});

						} else if (res.hasil == 'id_belum_ada') {
							swal({
								title: "Gagal",
								text: "id belum terdaftar:'(",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "error"
							});

						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".submit2").click(function (event) {
				event.preventDefault();
				var nik = $("#nik_wakil").val();
				var jabatan = $("#jabatan_wakil").val();
				var no_kandidat = $("#no_wakil").val();
				var nama_kandidat = $("#nama_wakil").val();
				var alamat = $("#alamat_wakil").val();
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/admin/tambah_kandidat",
					dataType: 'json',
					data: {
						nik: nik,
						jabatan: jabatan,
						no_kandidat: no_kandidat,
						nama_kandidat:nama_kandidat,
						alamat:alamat
					},
					success: function (res) {
						if (res.hasil == 'true') {
							swal({
								title: "Edit Sukses",
								text: "Data Berhasil di Edit",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "success",
							}).then(function () {
								$('#nik_wakil').attr('disabled','disabled')
								$('#nama_wakil').attr('disabled','disabled')
								$('#alamat_wakil').attr('disabled','disabled')
								$('.submit2').attr('disabled','disabled');
						
							})

						} else if (res.hasil == 'false') {
							swal({
								title: "Gagal",
								text: "Data Sudah Ada :'(",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "error"
							});
						} else if (res.hasil == 'id_kosong') {
							swal({
								title: "Gagal",
								text: "id harus diIsi:'(",
								showConfirmButton: true,
								confirmButtonColor: "#29b6f6",
								type: "error"
							});

						} else if (res.hasil == 'id_belum_ada') {
							swal({
								title: "Gagal",
								text: "id belum terdaftar:'(",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "error"
							});

						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".submit3").click(function (event) {
				event.preventDefault();
				var no = $("#no").val();
				var visi = $("#visi").val();
				var misi = $("#misi").val();
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/admin/proses_tambah_visimisi",
					dataType: 'json',
					data: {
						no: no,
						visi: visi,
						misi: misi
					},
					success: function (res) {
						if (res.hasil == 'true') {
							swal({
								title: "Sukses",
								text: "Data Di Tambahkan",
								showConfirmButton: true,
								confirmButtonColor: '#29b6f6',
								type: "success"
							}).then(function () {
								
								$('#visi').attr('disabled','disabled')
								$('#misi').attr('disabled','disabled')
								$('.submit3').attr('disabled','disabled');
						
							})
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
	</script>
	<?php include('Footer.php');?>
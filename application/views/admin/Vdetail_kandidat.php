<?php  include('Header.php');?>
<?php error_reporting(0);
	if(isset($data)){
		foreach ($data as $user) {
			$nik= $user->nik;
			$nama = $user->nama_kandidat;
			$alamat= $user->alamat;
			$no = $user->no_kandidat;
			$jabatan = $user->jabatan;
			$name = $user->name;
			$visi = $user->visi;
			$misi = $user->misi;
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="card teal-text">
			<div class="card content">
				<div class="row">
					<div class="col s12">
						<ul class="tabs ">
							<li class="tab col s3"><a href="#profile">Profil Info</a></li>
							
						</ul>
					</div>
					<div class="row" style="min-height: 50px">

					</div>
					<!--Profile-->
					<div id="profile" class="col s12">
						<div class="row"></div>
						<div class="col s5">
							<?php
					    				$image = base_url();
				          				$path = "/pictures/";
				          				$properti = array(
				                        'src' => $image.$path.$name,
				                        'max-width' => '400',
				                        'height'=> '200',
				                        'class'=>'responsive-img'
						                      );
						                  echo img($properti);
					    			?>
								<div class="col s12" style="min-height: 50px"></div>
						</div>
						<div class="col s7">
							<table class="striped black-text">
								<tbody>
									<tr>
										<td><b>nik</b></td>
										<td>:&nbsp
											<?php echo $nik;?>
										</td>
									</tr>
									<tr>
										<td><b>Nama</b></td>
										<td>:&nbsp
											<?php echo $nama?>
										</td>
									</tr>
									<tr>
										<td><b>Alamat</b></td>
										<td>:&nbsp
											<?php echo $alamat?>
										</td>
									</tr>

									<tr>
										<td><b>Jabatan</b></td>
										<td>:&nbsp
											<?php echo $jabatan;?>
										</td>
									</tr>
									<tr>
										<td><b>Visi</b></td>
										<td>:&nbsp
											<?php echo $visi;?>
										</td>
									</tr>
									<tr>
										<td><b>Misi</b></td>
										<td>:&nbsp
											<?php echo $misi;?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!--End Profile-->
					
					<!-- Visi Misi -->
				
					<!--Update Photo-->
					
					<!--End Update Photo-->
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				$('select').material_select();
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(".submit").click(function (event) {
					event.preventDefault();
					var id_user = $("#id_user").val();
					var nama = $("#nama").val();
					var kandidat = $("#kandidat").val();
					var jabatan = $("#jabatan").find("option:selected").val();
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>" + "Admin/update_kandidat",
						dataType: 'json',
						data: {
							id_user: id_user,
							nama: nama,
							kandidat: kandidat,
							jabatan: jabatan
						},
						success: function (res) {
							if (res.hasil == 'true') {
								swal({
										title: "Edit Sukses",
										text: "Data Berhasil di Edit",
										showConfirmButton: true,
										confirmButtonColor: '#29b6f6',
										type: "success"
									},
									function () {
										window.location.href = "<?php echo site_url('Admin/vkandidat'); ?>";
									});

							}
						}
					});
				});
			});
		</script>
		<script>
			var loadFile = function (event) {
				var output = document.getElementById('output');
				output.src = URL.createObjectURL(event.target.files[0]);
			};
		</script>
		<?php include('Footer.php');?>
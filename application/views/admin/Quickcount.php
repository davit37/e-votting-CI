<?php include('Header.php');?>
<?php foreach($angka as $data){
		$max_no=$data->no_max;
		}	
		$jumlah = $total->total;
		
?>
<?php 
	$no = $no_calon['no_kandidat'];
	?>
<div class="container">
	<?php if($no > 0){ ?>
	<div class='card'>
		<p style="text-align:center; font-size: 2em;">QuickCount</p>
		<div class='row'>
			<?php if ($jumlah >0){?>

			<div class="col s12 m13 ">
				<?php 
							for($i=1; $i<=$no; $i++){
								$vote = $suara[$i];
								
								$pesentase=round($vote/$jumlah*100, 1);
								$pesentase2=round($vote/$jumlah*100);
								?>

				<?php	if($max_no == 3){ ?>
					<div class="col s4">
						<?php } 
										else{
									?>
						<div class="col s6">
							<?php } ?>
							<div class="card valign-wrapper">
								<?php	if($max_no == 3){ ?>
									<div class="col  ">
										<?php } 
										else{
											?>
										<div class="col  offset-s2">
											<?php } ?>
											<h5 class="col s5 m12">No Urut
												<?php echo $i;?>
											</h5>

											<div class="card-content">
												<br>

												<div class="c100  p<?php echo $pesentase2; ?> big ">
													<span>
														<?php echo $pesentase."%";?>
													</span>


													<div class="slice">
														<div class="bar "></div>
														<div class="fill"></div>
													</div>
												</div>
											</div>
											<div class="card-content">
												<p>Total suara di peroleh :
													<?php echo $vote;?>
												</p>
											</div>
										</div>

									</div>

							</div>

							<?php
							}
						?>
						</div>

					</div>
			</div>



			<div class="row">
				<div class="col s12 center">
					<a class="btn waves-effect waves-light light-blue lighten-1 .btn" href="">RESET</a>
				</div>
			</div>
			<?php } 
			else{
			?>
			<div class="col s12 m13 ">
				<?php 
								for($i=1; $i<=$no; $i++){
									$vote = $suara[$i];
									
								
									?>

				<?php	if($max_no == 3){ ?>
					<div class="col s4">
						<?php } 
											else{
										?>
						<div class="col s6">
							<?php } ?>
							<div class="card valign-wrapper">
								<?php	if($max_no == 3){ ?>
									<div class="col  ">
										<?php } 
											else{
												?>
										<div class="col  offset-s2">
											<?php } ?>
											<h5 class="col s5 m12">No Urut
												<?php echo $i;?>
											</h5>

											<div class="card-content">
												<br>

												<div class="c100  p0 big ">
													<span>
														0%
													</span>


													<div class="slice">
														<div class="bar "></div>
														<div class="fill"></div>
													</div>
												</div>
											</div>
											<div class="card-content">
												<p>Total suara di peroleh :
													<?php echo $vote;?>
												</p>
											</div>
										</div>

									</div>

							</div>

							<?php
								}
							?>
						</div>

					</div>
			</div>
			


			<?php
		}
		} ?>
		</div>

		<script type="text/javascript">
			$(document).ready(function () {
				$('.btn').click(function (event) {
					event.preventDefault();
					swal({
						title: 'Yakin akan mereset data?',
						text: "data akan direset!",
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'YA!'
					}).then((result) => {

						if (result.value) {
							jQuery.ajax({
								type: "GET",
								url: "<?php echo base_url(); ?>" + "index.php/Admin/reset",
								dataType: 'json',

								success: function (res) {
									if (res.hasil = 'true') {
										swal({
											title: "Sukses",
											text: "Data Berhasil di Reset",
											showConfirmButton: true,
											confirmButtonColor: '#29b6f6',
											type: "success"
										}).then(
											function () {
												window.location.href = "<?php echo site_url('admin/quickqount'); ?>";
											})
									}
								}
							});
						} else {
							swal("Batal", "Data Aman.... :)", "error");
						}
					})
				})
			})
		</script>
		<?php include('Footer.php');?>
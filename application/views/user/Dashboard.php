<?php include('Header.php');?>
<?php error_reporting(0)?>
<?php foreach($angka as $data){
		$max_no=$data->no_max;
		}	
		
	?>

<div class="container ">
	<div class="card grey lighten-5">


		<div class="row">
			<div class="col s12">

				<?php 
				
				date_default_timezone_set('Asia/jakarta');
				$date = date('Y-m-d H:i:s');
				
				
				
				if($date > $start && $date < $end){?>

				<div class="col s2">
					<div class="card">
						<div class="card-content" style="height: 90px;">
							<h5 id="hari" class="center"></h5>
						</div>
					</div>
				</div>
				<div class="col s2">
					<div class="card">
						<div class="card-content" style="height: 90px;">
							<h5 id="jam" class="center"></h5>
						</div>
					</div>
				</div>
				<div class="col s2">
					<div class="card">
						<div class="card-content" style="height: 90px;">
							<h5 id="menit" class="center"></h5>
						</div>
					</div>
				</div>
				<div class="col s2">
					<div class="card">
						<div class="card-content" style="height: 90px;">
							<h5 id="detik" class="center"></h5>
						</div>
					</div>
				</div>
				<div class="col s4 md-2">
					<div class="card">
						<div class="card-content" style="height: 90px;">
							<h5 id="textvote" class="center red-text">Silahkan vote</h5>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>

		<?php 
			$no = $no_calon['no_kandidat'];
			if ($no == NULL){
				echo "Belum Ada Calon";
			}
			?>

		<div class="row">


			<div class="col s12 ">

				<?php 
							foreach ($daftar_kandidat as $kandidat) {
								$photo = $kandidat->name;
								$no= $kandidat->no_kandidat;

								
								?>
				<?php	if($max_no == 3){ ?>
					<div class="col s4">
						<?php } 
									else{
								?>
						<div class="col s6">
							<?php } ?>

							<div class="card  ">
								<div class="card-image">
									<?php
											$image = base_url();
											$path = "/pictures/";
											$properti = array(
											'src' => $image.$path.$photo,
											'width' => '',
											'height'=> '',
											'class' => 'responsive-img'
											);
											echo img($properti);
										?>

								</div>

								<div class="center card-action">
									<span class="card-title  white-text">
										<h5 style="background-color:#29b6f6">No Urut
											<?php echo $kandidat->no_kandidat;?>
										</h5>
									</span>
									<button class="btn waves-effect waves-light light-blue lighten-1 submit<?php echo $no; ?>" type="submit" name="action" <?php
									    echo $disable;?>>Pilih
									</button>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function () {
								$(".submit<?php echo $no ?>").click(function (event) {
									event.preventDefault();
									var no = <?php echo $no; ?>;
									jQuery.ajax({
										type: "GET",
										url: "<?php echo base_url(); ?>" + "index.php/user/hasil_voting",
										dataType: 'json',
										data: {
											no: no
										},
										success: function (res) {
											if (res.hasil == 'true') {
												swal({
														title: "Voting Berhasil",
														text: "Terima Kasih Sudah Berpatisipasi",
														showConfirmButton: true,
														confirmButtonColor: '#00b0ff',
														type: "success"
													},
													function () {
														window.location.href = "<?php echo site_url('login/logout2')?>";
													});

											}
										}
									});
								});
							});
						</script>

						<?php
							}
						?>
					</div>
			</div>

		</div>
	</div>

	<script>
		CountDownTimer("<?php echo $end;?>", 'hari', 'jam', 'menit', 'detik');

		function CountDownTimer(dt, id1, id2, id3, id4) {
			var end = new Date(dt);

			var _second = 1000;
			var _minute = _second * 60;
			var _hour = _minute * 60;
			var _day = _hour * 24;
			var timer;

			function showRemaining() {
				var now = new Date();
				var distance = end - now;
				var distance1 = now - end;
				if (distance1 > 0) {
					document.getElementById(id).innerHTML = 'Voting Sudah Berakhir';
					clearInterval(timer);
					return;
				}
				var days = Math.floor(distance / _day);
				var hours = Math.floor((distance % _day) / _hour);
				var minutes = Math.floor((distance % _hour) / _minute);
				var seconds = Math.floor((distance % _minute) / _second);

				document.getElementById(id1).innerHTML = days + ' Hari';
				document.getElementById(id2).innerHTML = hours + ' Jam';
				document.getElementById(id3).innerHTML = minutes + ' Men';
				document.getElementById(id4).innerHTML = seconds + ' Detik';
			}

			timer = setInterval(showRemaining, 1000);
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});
	</script>
	<?php include('Footer.php');?>
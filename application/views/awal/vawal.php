<?php include('Header.php');?>
<?php foreach($angka as $data){
		$max_no=$data->no_max;
		}	
		$jumlah = $total->total;
		
?>

<?php 
	$no = $no_calon['no_kandidat'];
	if ($no == NULL){
		echo "Belum Ada Calon";
	}
?>
    
<?php 
	$no = $no_calon['no_kandidat'];
	?>
	<div class="container" >
	
        
            <div class='card blue-grey darken-1'>
				
				<?php if($jumlah > 0){ ?>
				<div class='card' >
					<p style="text-align:center; font-size: 2em;">QuickCount</p>
					<div class='row'>

					
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
											<h5 class="col s5 m12">No Urut <?php echo $i;?></h5>
											
											<div class="card-content">
											<br>

											 <div class="c100  p<?php echo $pesentase2; ?> big ">
												<span><?php echo $pesentase."%";?></span>
												
												
												<div class="slice">
													<div class="bar "></div>
													<div class="fill"></div>
												</div>
											 </div>
											 </div>
											 <div class="card-content" >
											 <p>Total suara di peroleh : <?php echo $vote;?></p>
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
				<?php } ?>
				<div class='card' >
					<p style="text-align:center; font-size: 2em;margin-bottom:5px;">Detail kandidat</p>
					<p style="text-align:center; font-size: 10px;color:gray">Klik Nomor untuk lihat detail kandidat</p>
					<div class='row'>
						<div class="col s5 m12">

							<?php 
								for($i=1; $i<=$no; $i++){
									?>
									<a href="<?php echo site_url('awal/detail_kandidat')?>/<?php echo $i;?>">
										<div class="col s4 ">
											<div class="card valign-wrapper">
											<h1 class="col s7"><?php echo $i;?></h1>
											</div>
										</div>
									</a>
									<?php
								}
							?>
						</div>
					</div>
				</div>
				
			</div>
		
	</div>
<?php include('Footer.php');?>

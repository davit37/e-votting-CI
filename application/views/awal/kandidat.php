<?php include('Header.php');?>
<div class="tengah" style="margin-top: 1%">
	<div class="row">
		<?php 
		foreach ($detail_kandidat as $kandidat) {
			$id_user = $kandidat->id_user;
			$alamat = $kandidat->alamat;
			$no = $kandidat->no_kandidat;
			$jabatan = $kandidat->jabatan;
			$name = $kandidat->nama;
			$photo = $kandidat->name;
			$visi = $kandidat->visi;
			$misi = $kandidat->misi;
			?>

		<div class="col s3">
			<?php
				$image = base_url();
				$path = "/pictures/";
				$properti = array(
				'src' => $image.$path.$photo,
				'width' => '',
				'height'=> '200',
				'class' => 'responsive-img'
				);
				echo img($properti);
			?>	
		</div>
			<div class="col s3">
			<table class="striped">
				
				<tr><td>Nama: &nbsp;<?php echo $name?></td></tr>
				<tr><td>Alamat: &nbsp;<?php echo $alamat?></td></tr>
				<tr><td>Jabatan: &nbsp;<?php echo $jabatan?></td></tr>
			</table> 
			</div>
		<?php }
	?>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="card panel">
				<div class="card context">
					<div class="row">
						<div class="col s10 offset-s1">
							<h5 class="center">Visi</h5>
							<p><?php echo $visi;?></p>
						</div>
						<div class="col s10 offset-s1">
							<h5 class="center">Misi</h5>
							<p><?php echo $misi;?></p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('Footer.php');?>
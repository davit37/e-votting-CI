<?php  include('Header.php');?>

<div class="container" style="margin-top: 25px">

	<div class="row">
		

		<div class="col s4">
			<div class="card hoverable">
				<div class="card-image waves-effect waves-block waves-light center activator">
					<i class="fa fa-group large activator " style="padding-top: 70px;"></i>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Kandidat Walikota<i class="fa fa-reorder right" style="padding-top: 10px"></i></span>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Kandidat walikota<i class="fa fa-remove right red-text"></i></span>
					<p><a href="<?php echo site_url('Admin/vkandidat')?>">Daftar data Kandidat</a></p>
					<p><a href="<?php echo site_url('Admin/vdaftar_kandidat')?>">Tambah Kandidat</a></p>
					<p><a href="<?php echo site_url('Admin/quickqount')?>">Quick Count</a></p>
				</div>
			</div>
		</div>

		<div class="col s4">
			<div class="card hoverable">
				<div class="card-image waves-effect waves-block waves-light center activator">
					<i class="fa fa-user-o large activator " style="padding-top: 70px;"></i>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">User<i class="fa fa-reorder right" style="padding-top: 10px"></i></span>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">User<i class="fa fa-remove right red-text"></i></span>
					<p><a href="<?php echo site_url('Admin/daftar_user')?>">Daftar User</a></p>
					<p><a href="<?php echo site_url('Admin/generate_code')?>">Tambah user</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('Footer.php');?>
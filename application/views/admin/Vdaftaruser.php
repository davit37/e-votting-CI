<?php  include('Header.php');?>
<div class="container">
	<div class="row">
		<div class="card hoverable">
			<div class="card-panel">
				<span>
					<a href="<?php echo site_url('admin');?>">Home</a>
				</span> >
				<span>Data user</span>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="card-panel hoverable">
			<div class="row">
				<div title="tambah user" class="col s1 offset-s6" disabled>
					<a class="waves-effect waves-light btn light-blue lighten-1" style="width:20px; padding-left:10px; margin-top:10px" href="<?php echo site_url('Admin/generate_code')?>">
						<i class="small fa fa-user-plus left white-text" style="padding:2px"></i>
					</a>
				</div>
				<div class="col s4">
					<?php echo form_open('Admin/search_user')?>
					<input type="text" placeholder="Cari" name="search" value="" />
					<?php echo form_close()?>
				</div>
			</div>
			<div class="row">
				<div class="col s10 offset-s1">
					<div class="row">
						<div class="col s10 offset-s1">
							<table>
								<thead>
									<tr>
										<th data-field="no">No</th>
										<th data-field="Username">Username</th>
										<th data-field="nik">Nik</th>
										<th data-field="Nama">Nama</th>
										<th data-field="Nama">akses</th>
										<th data-field="Code">Password</th>
										<th data-field="Detail">Detail</th>
										<th data-field="Delete">Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
		                        	if(!isset($no)){
		                        		$no=1;
		                        	}
		                        ?>
										<?php
		                              foreach ($data as $data) {
										  $role=$data->akses;
										  if($role==='a'){
											  $role="Admin";
										  }else if($role==='u'){
											$role="pemilih";
										  }
		                                echo "<tr>";
		                                  echo "<td>$no</td>";
		                                  echo "<td>$data->username</td>";
										  echo "<td>$data->nik</td>";
										  echo "<td>$data->nama</td>";
										  echo"<td>$role</td>";
		                                  echo "<td>$data->code</td>";?>
											<td>
												<?php echo anchor('admin/user_akun_detail?id='.$data->id_user, '<i class="fa fa-list fa-lg"></i>');?>
											</td>
											<td>
												<a href="#">
													<i class="fa fa-trash fa-lg red-text" onclick="myFunction(<?php echo $data->id_user?>)"></i>
												</a>
											</td>
											<?php echo "</tr>";
		                                $no++;
		                              }
		                            ?>
								</tbody>
							</table>

							<?php if(isset($pagination)){
		                  	echo $pagination;}?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	function myFunction(id) {
		var id = id;
		swal({
			title: 'Anda Yakin?',
			text: "Data yg dihapus tidak bisa kembali!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, !'
		}).then((result) => {
				
					if (result.value) {
						jQuery.ajax({
							type: "GET",
							url: "<?php echo base_url(); ?>" + "index.php/admin/hapus_user",
							dataType: 'json',
							data: {
								id: id
							},
							success: function (res) {
								if (res.hasil = 'true') {
									swal({
											title: "Sukses",
											text: "Data Berhasil di Hapus",
											showConfirmButton: true,
											confirmButtonColor: '#29b6f6',
											type: "success"
										}).then(
											function () {
											window.location.href = "<?php echo site_url('admin/daftar_user'); ?>";
											})
								}
							}
						});
					} else {
						swal("Batal", "Data Aman.... :)", "error");
					}
				})
	}
</script>
<?php include('Footer.php');?>
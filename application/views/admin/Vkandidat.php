<?php  include('Header.php');?>
<?php foreach($angka as $data){
		$max_no=$data->no_max+1;
		}	
 ?>
<div class="container">

	<div class="row">
		<div class="card-panel hoverable">	
			<ul class="tabs ">
			<li class="tab col s3"><a href="#data">Data Kandidat</a></li>
			<li class="tab col s3" ><a href="#visi">Visi Misi</a></li>
			
			
		</ul>
		   <div id="data">
					<div class="row">
						<div class="col s10 offset-s1">
									 <div class="row">
									  <div class="col s12 offset-s1" style="margin-left: 20px;">
										  <table>
												<thead>
												  <tr>
													  <th data-field="no">No</th>
													  <th data-field="id_user">NIK</th>
													  <th data-field="Nama">Nama</th>
													  <th data-field="jurusan">Alamat</th>
													  <th data-field="noKandidat">No_urut</th>
													<th data-field="Jabatan">jabatan</th>

													  <th data-field="detail">Detail</th>
													  <th data-field="delete">Delete</th>
												  </tr>
												</thead>
												<tbody>
													<?php 
													$no = 1;
													  foreach ($daftar_kandidat as $kandidat) {
														echo "<tr>";
														  echo "<td>$no</td>";
														  echo "<td>$kandidat->nik</td>";
														  echo "<td>$kandidat->nama_kandidat</td>";
														  echo "<td>$kandidat->alamat</td>";
														  echo "<td>$kandidat->no_kandidat</td>";
															echo "<td>$kandidat->jabatan</td>";?>
																							
														  <td><?php echo anchor('admin/detail_kandidat?nik='.$kandidat->nik, '<i class="fa fa-list fa-lg"></i>');?></td>
														  <td><a href="#"><i class="fa fa-trash fa-lg red-text"
														   onclick="myFunction(<?php echo $kandidat->no_kandidat?>)"></i></a></td>
													   <?php echo "</tr>";
														$no++;
													  }
													?>
												</tbody>
										  </table> 
									  </div>
									  
									</div>
									 <div class="row">
							
									  <div class="col s14 "><?php if($max_no <= 3){?> <a class="waves-effect waves-light btn light-blue lighten-1"  href="<?php echo site_url('admin/vdaftar_kandidat')?>">Tambah</a><?php } ?> </div>
									</div>
								</div>
							</div>
					</div>
				<div id='visi'>
					<div class="row">
						<div class="card teal-text">
							<div class="card-content ">
							
								<ul class="collapsible" data-collapsible="accordion">
								<?php 
										if($daftar_visimisi != null){
										foreach ($daftar_visimisi as $visimisi) {
											$no = $visimisi->no_kandidat;
											$visi = $visimisi->visi;
											$misi = $visimisi->misi;
											?>
												<li>
												  <div class="collapsible-header active">No Urut <?php echo "".$no; ?></div>
													<div class="collapsible-body"><b><span style="margin-left: 10px">Visi</span></b><p><?php echo "".$visi;  ?></p>
													<b><span style="margin-left: 10px">Misi</span></b><p><?php echo "".$misi;  ?></p>
													</div>
												</li>
										
												<?php	}
													}else{
														echo "There is no data loaded...";
													}
												?>
								</ul>
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
			title: 'yakin menghapus?',
			text: "data akan dihapus!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, hapus!'
		}).then((result) => {
				
					if (result.value) {
						jQuery.ajax({
							type: "GET",
							url: "<?php echo base_url(); ?>" + "index.php/admin/hapus_kandidat",
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
											window.location.href = "<?php echo site_url('admin/vkandidat'); ?>";
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
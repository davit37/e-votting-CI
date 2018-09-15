<?php  include('Header.php');?>

<div class="container">

	<div class="row">
		<div class="card-panel hoverable">	
			
		   <div id="data">
               <div class="row"><div class="col s7 offset-s3">
						<h3>Laporan Data Kandidat</h3>
						</div>
                    </div>
					<div class="row">
						<div class="col s10 offset-s1">
									 <div class="row">
									  <div class="col s12 offset-s1" style="margin-left: 20px;">
										  <table>
												<thead>
												  <tr>
													  <th data-field="no">No</th>
													  <th data-field="id_user">Id user</th>
													  <th data-field="Nama">Nama</th>
													  <th data-field="jurusan">Alamat</th>
													  <th data-field="noKandidat">No urut</th>
													<th data-field="Jabatan">jabatan</th>

													  
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
																							
														  
													   <?php echo "</tr>";
														$no++;
													  }
													?>
												</tbody>
										  </table> 
									  </div>
									  
									</div>
									
								</div>
							</div>
					</div>
			
		</div>
	</div>
</div>

<?php include('Footer.php');?>
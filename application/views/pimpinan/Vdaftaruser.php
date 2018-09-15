<?php  include('Header.php');?>
<div class="container">

<div class="row">

	<div class="card-panel hoverable">
        <div class="row">
					
						<div class="col s7 offset-s3">
						<h3>Laporan Data User</h3>
						</div>
          </div>
	<div class="row">
		<div class="col s10 offset-s1">
			
              
            </div>
					 <div class="row">
		              <div class="col s10 offset-s1">
										
		                  <table>
		                        <thead>
		                          <tr>
		                             <th data-field="no">No</th>
		                              <th data-field="id_user">Id User</th>
									<th data-field="nik">Nik</th>
		                              <th data-field="Nama">Nama</th>
		                              <th data-field="Code">Code</th>
		                              
		                              
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
		                                echo "<tr>";
		                                  echo "<td>$no</td>";
		                                  echo "<td>$data->id_user</td>";
										  echo "<td>$data->nik</td>";
		                                  echo "<td>$data->nama</td>";
		                                  echo "<td>$data->code</td>";?>
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


<?php include('Footer.php');?>

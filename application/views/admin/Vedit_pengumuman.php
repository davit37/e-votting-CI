<?php include('Header.php');?>
<?php foreach ($data as $key) {
		$id = $key->id_peng;
		$judul = $key->judul;
		$desc = $key->deskripsi;
	} ?>
<div class="row">
<div class='container'>
	<div class="card-panel">
	<div class='row'>
		<h4 class="blue-text text-lighten-2">Edit pengumuman</h4>
	<?php echo form_open(); ?>
		<div class='col s7'>
			 <div class="row">
		        <div class="input-field col s8">
		          
		          <input id="judul" type="text" class="validate" name="judul" value="<?php echo $judul; ?>">
		          <label for="judul">Judul</label>
		        </div>
		</div>
		<div class="row">
		
		        <div class="input-field col s7">
		          
		          <textarea id="keterangan" class="materialize-textarea" name="keterangan"><?php echo $desc;?></textarea>
		          <label for="keterangan">Keterangan/isi pengumuman</label>
				  <i ></i>
		        </div>
      	</div>
      	<button type="submit" class="waves-effect waves-light btn light-blue lighten-1 submit">Edit</button>
		<button type="reset"  class="waves-effect waves-light btn light-blue lighten-1">Cancel</button>
	<?php echo form_close(); ?>
	</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
			$(".submit").click(function(event) {
			event.preventDefault();
			var judul= $("#judul").val();
			var desc = $("#keterangan").val();			
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>"+"admin/proses_edit_pengumuman",
			dataType: 'json',
			data: {judul: judul, keterangan: desc},
			success: function(res) {
				if(res.hasil == 'true'){
					swal({
						title: "Edit Sukses",
						text: "Data Berhasil di Edit",
						showConfirmButton: true,
						confirmButtonColor: '#29b6f6',
						type:"success"
					},
					function(){
					  window.location.href = "<?php echo site_url('admin/daftar_pengumuman'); ?>";
					});
	
				}
			}
			});
			});
			});
</script>
<?php include('Footer.php');?>
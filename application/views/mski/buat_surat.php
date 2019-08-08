<head>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>

<script type="text/javascript">
$(document).ready(function(){

 $('#kode').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var npmfromfield = $('#kode').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
  $.ajax({        // Memulai ajax
    url: "<?php echo base_url('index.php/c_pengguna/ajaxrespon') ?>",    // file PHP yang akan merespon ajax
    method: "POST",      
    data: { kode: npmfromfield},  // data POST yang akan dikirim
  })
    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
        $('#nama').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
    });
 })
});

$(document).ready(function(){

 $('#nama_kepala').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var npmfromfield = $('#nama_kepala').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
  $.ajax({        // Memulai ajax
    url: "<?php echo base_url('index.php/c_pengguna/nama_kepala') ?>",    // file PHP yang akan merespon ajax
    method: "POST",      
    data: { nama_kepala: npmfromfield},  // data POST yang akan dikirim
  })
    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
        $('#nip').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
    });
 })
});

</script>
<style type="text/css">
	#head{
		background-color: #f5f5f5;
		text-align: center;
	}
	#form{
		background-color: #eae6e6;
		padding: 50px;	
	}
	.kolom{
		width:70%;
	}
	#radiojarak{
		margin-right: 100px;
	}
	#tab{
		width: 100%;
	}
	#tab1{
		width: 85%;
	}
	#tab2{
		width: 15%;
	}
	#sub{
		font-family: fantasy;
		display: block;
		width: 150px;
		height: 50px;
		padding: 6px 12px;
		font-size: 18px;
		line-height: 1.42857143;
		color: #000;
		background-color: #7f9eb7;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
		     -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

	}
</style>
<fieldset>
<legend id="head">Input Surat Persetujuan Tambahan Uang Persediaan ( RM )</legend> 
<form id="form" action="<?php echo base_url('index.php/c_pengguna/simpan_surat') ?>" method="post">
	<label>No Surat</label> <span style="margin-left: 11em;">:</span> 
	<input class="kolom" type="text" name="no_surat" required><br><br>

	<label>Tanggal Surat</label> <span style="margin-left: 8.5em;">:</span> 
	<input class="kolom" type="date" name="tanggal_surat" required><br><br>
	<label>Kepada</label> <span style="margin-left: 11.5em;">:</span> 
	<input class="kolom" list="mk3" name="kode" id="kode"  required>
      	<datalist id="mk3"> 
  		<?php     
            foreach ($daerah as $da)
            { 
            	?>
                <option value="<?php echo $da->kode; ?>"></option>
        <?php } ?>
 		</datalist>
    </input><br><br>
	 <span style="margin-left: 15.4em;">: </span><input class="kolom" type="text" name="kepada"  id="nama" required><br><br>

	<label>Tempat</label> <span style="margin-left: 11.6em;">: </span> 
	<input class="kolom" type="text" name="tempat" required><br><br>

	<label>No Surat Pengajuan</label> <span style="margin-left: 5.6em;">:</span> 
	<input class="kolom" type="text" name="no_surat_pengajuan" required><br><br>

	<label>Tanggal Pengajuan</label> <span style="margin-left: 6em;">:</span> 
	<input class="kolom" type="date" name="tanggal_pengajuan" required><br><br>

	<label>Jumlah Uang</label> <span style="margin-left: 8.9em;">:</span> 
	<input class="kolom" type="text" name="jumlah_uang" placeholder="Isi tanpa titik contoh 1000000" required><br><br>

	<label>No Beban</label> <span style="margin-left: 10.5em;">:</span> 
	<input class="kolom"  type="text" name="no_beban" required><br><br>

	<label>Tanggal Ketetapan Beban</label> <span style="margin-left: 3em;">:</span> 
	<input class="kolom" type="date" name="tanggal_ketetapan_beban" required><br><br>

	<label>Status Kepala</label> <span style="margin-left: 8.6em;">:</span> 
	<!-- <input type="text" name="status_kepala"><br><br> -->
	<input type="radio" name="status_kepala" value=""  required> Definitif <span id="radiojarak"></span> 
	<input type="radio" name="status_kepala" value="Plt." > Plt <span id="radiojarak"></span>
	<input type="radio" name="status_kepala" value="Plh." > Plh</span><br><br>
	<!-- <span style="margin-left: 16em;"></span> 
	<input class="kolom" type="text" name="ket_jabatan_kepala"><br><br> -->
	<span style="margin-left: 16em;"></span> 
	<select class="kolom" name="ket_jabatan_kepala">
		<option value=""></option>
		<option value="Kepala Pencairan Dana">Kepala Pencairan Dana</option>
		<option value="Kepala Pencairan Dana">Kepala Seksi MSKI</option>
		<option value="Kepala Pencairan Dana">Kepala Seksi Bank</option>
		<option value="Kepala Pencairan Dana">Kepala Seksi Vera</option>
	</select><br><br>
	<label>Nama Kepala</label> <span style="margin-left: 9em;">:</span> 
	<select id="nama_kepala" class="kolom" name="nama_kepala" required>
		<option></option>
  		<?php     
            foreach ($pegawai_atas as $pe)
            { 
            	?>
                <option><?php echo $pe->nama; ?></option>
        <?php } ?>
    </select>
    <br><br>

	<label>Nip Kepala</label> <span style="margin-left: 10.1em;">:</span> 
	<input class="kolom" id="nip" type="text" name="nip_kepala" required><br><br>
	<center><input type="submit" id="sub" value="Submit"></center>
	</table>

	

</form>
</fieldset>

<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
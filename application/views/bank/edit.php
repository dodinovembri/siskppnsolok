<?php foreach ($bank as $p) { ?>
	
<head>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>


<script type="text/javascript">
$(document).ready(function(){

 $('#kode').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var npmfromfield = $('#kode').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
  $.ajax({        // Memulai ajax
    url: "<?php echo base_url('index.php/c_bank/ajaxrespon') ?>",    // file PHP yang akan merespon ajax
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
    url: "<?php echo base_url('index.php/c_bank/nama_kepala') ?>",    // file PHP yang akan merespon ajax
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
	#kolom{
		width:75%;
	}
	.kolom{
		width:75%;
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
<legend id="head">Edit Surat Pemberitahuan Retur SP2D</legend>
<form id="form" action="<?php echo base_url('index.php/c_bank/simpan_edit_surat') ?>" method="post">
	<label>No Surat</label> <span style="margin-left: 11em;">:</span>  
	<input id="kolom" type="text" name="no_surat" value="<?php echo $p->no_surat; ?>" required><br><br>

	<label>Tanggal Surat</label> <span style="margin-left: 8.6em;">:</span> 
	<input id="kolom" type="date" name="tanggal_surat" value="<?php echo $p->tanggal_surat; ?>" required><br><br>

	<label>Kode Daerah</label> <span style="margin-left: 9em;">:</span> 
	<input class="kolom" list="mk3" name="kode" id="kode" value="<?php echo $p->kode; ?>" required>
      	<datalist id="mk3"> 
  		<?php     
            foreach ($daerah as $da)
            { 
            	?>
                <option value="<?php echo $da->kode; ?>"></option>
        <?php } ?>
 		</datalist>
    </input><br><br>

    <label>Kepada</label><span style="margin-left: 11.9em;">:</span> 
	<input class="kolom" id="nama" type="text" name="kepada" value="<?php echo $p->kepada; ?>" required><br><br>

	<label>Satker</label> <span style="margin-left: 12.2em;">:</span> 
	<input id="kolom" type="text" name="satker" value="<?php echo $p->satker; ?>" required><br><br>

	<label>Tempat</label> <span style="margin-left: 11.9em;">:</span>
	<input id="kolom" type="text" name="tempat" value="<?php echo $p->tempat; ?>" required><br><br>

	<label>Bank Retur</label> <span style="margin-left: 10em;">:</span>
	<input id="kolom" type="text" name="bank_retur" value="<?php echo $p->bank_retur; ?>" required><br><br>

	<label>Tanggal Ralat Paling Lambat</label> <span style="margin-left: 1.8em;">:</span> 
	<input id="kolom" type="date" name="tanggal_ralat" value="<?php echo $p->tanggal_ralat; ?>" required><br><br>
	
	<label>Status Kepala</label> <span style="margin-left: 8.8em;">:</span>
	<!-- <input type="text" name="status_kepala"><br><br> -->
	<input type="radio" name="status_kepala" value=""  onclick="myFunction()" <?php if ($p->status_kepala == ''){echo 'checked';} ?> required> Definitif <span id="radiojarak"></span> 
	<input type="radio" name="status_kepala" value="Plt." <?php if ($p->status_kepala == 'Plt.'){echo 'checked';} ?> onclick="myFunction2()"> Plt <span id="radiojarak"></span>
	<input type="radio" name="status_kepala" value="Plh." <?php if ($p->status_kepala == 'Plh.'){echo 'checked';} ?> onclick="myFunction3()"> Plh</span><br><br>
	<!-- <span style="margin-left: 16em;"></span> 
	<input class="kolom" type="text" name="ket_jabatan_kepala"><br><br> -->
	<label>Ket Jabatan Kepala</label><span style="margin-left: 6.4em;">:</span> 
	<select class="kolom" name="ket_jabatan_kepala">
		<option><?php echo $p->ket_jabatan_kepala; ?></option>
		<option value=""></option>
		<option value="Kepala Pencairan Dana">Kepala Pencairan Dana</option>
		<option value="Kepala Pencairan Dana">Kepala Seksi MSKI</option>
		<option value="Kepala Pencairan Dana">Kepala Seksi Bank</option>
		<option value="Kepala Pencairan Dana">Kepala Seksi Vera</option>
	</select><br><br>
	<label>Nama Kepala</label> <span style="margin-left: 9em;">:</span> 
	<input id="nama_kepala" list="mk2" class="kolom" name="nama_kepala" value="<?php echo $p->nama_kepala; ?>" required>
		<datalist id="mk2"> 
		<option></option>
  		<?php     
            foreach ($pegawai_atas as $pe)
            { 
            	?>
                <option><?php echo $pe->nama; ?></option>
        <?php } ?>
    	</datalist>
    </input>
    <br><br>

	<label>Nip Kepala</label> <span style="margin-left: 10.1em;">:</span> 
	<input class="kolom" id="nip" type="text" name="nip_kepala" value="<?php echo $p->nip_kepala; ?>" required>
	<br><br>
		<center><input id="sub" type="submit" value="Submit"></center>
</form>
</fieldset>


<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>	

<?php } ?>
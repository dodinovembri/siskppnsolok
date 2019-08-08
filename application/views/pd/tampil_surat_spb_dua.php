<?php 
foreach ($penolakan_spms as $hasil) { ?>
<!-- batas awal pembukaan php -->
 <?php 
function tanggal_indo($tanggal)
					{
						$bulan = array (1 =>   'Januari',
									'Februari',
									'Maret',
									'April',
									'Mei',
									'Juni',
									'Juli',
									'Agustus',
									'September',
									'Oktober',
									'November',
									'Desember'
								);
						$split = explode('-', $tanggal);
						return $split[2]. ' ' .$bulan[ (int)$split[1] ] . ' ' . $split[0];
					}
 ?>
<style type="text/css">
	#head1{
		text-align: center;
		font-size: 13pt;
	}
	#head2{
		text-align: center;
		font-size: 11pt;
	}
	#head3{
		text-align: center;
		font-size: 8pt;
	}
	#badan{
		text-align: justify;
		font-size: 11pt;
	}
	#body{
		margin: 0.7cm;
		font-family: arial;
		margin-top: -0.5cm;
		}
	#img{
		width: 23mm;
		height: 22mm;
		margin-top: -45px;
	}
	#hr{
		border: 1;
		border-top: 3px double;
		margin-top: -0.1cm;
	}
	#no{
		font-size: 11pt;
	}
	#tgl{
		font-size: 11pt;
		float: right;
	}
	#ttd{
		float: right;
		font-size: 11pt;
	} 
	#atas{
		margin-top: -0.3cm;
		width: 100%;
	}
</style>
<body id="body">
<table align="center">
<tr>
<td style="width: 14%">
	<img id="img" src="<?php echo base_url() ?>assets/img/logokppn.jpg">
</td>
<td style="width: 86%"> 
<b><p align="center"><span id="head1">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</span><br>
<span id="head2">DIREKTORAT JENDERAL PERBENDAHARAAN<br>
KANTOR WILAYAH PROVINSI SUMATERA BARAT<br>
KANTOR PELAYANAN PERBENDAHARAAN NEGARA SOLOK</b></span>
<br>
<span id="head3">Jl. Raya Kotobaru Solok km.5 kodepos 27362 Telepon (0755) 20501 & 21632 Faksimile (0755) 20501<br>
Email:kppnsolok090@gmail.com</span></span></p>
</td>
</tr>
</table> 
<hr id="hr">
<table id="atas">
	<tr>
	<td id="no">
		Nomor <span style="margin-left: 0.4cm">:</span> S-<?php echo $hasil->no_surat; ?>/WPB.03/KP.090/<?php echo $this->session->userdata('tahun_anggaran'); ?>
	</td>
	<td id="tgl">
		<?php echo tanggal_indo($hasil->tanggal_surat); ?>
	</td>
</tr>
<tr>
	<td id="no">		
		Sifat <span style="margin-left: 0.8cm">:</span> Segera
	</td>
</tr>
<tr>
	<td id="no">
		Perihal <span style="margin-left: 0.37cm">:</span> Penolakan Surat Perintah Membayar Substantif<br>
	</td>
</tr>
</table>
<br>
<p id="badan">
Kepada Yth.<br>
Kuasa Pengguna Anggaran<br>
<?php echo $hasil->kepada; ?><br>
di <?php echo $hasil->tempat; ?>
<br><br>
<span style="margin-left: 1cm"></span>Berikut ini kami sampaikan bahwa SPM saudara dengan Nomor <?php echo $hasil->no_surat_pengajuan; ?> tanggal <?php echo tanggal_indo($hasil->tanggal_pengajuan); ?> tidak dapat di proses dikarenakan <?php echo $hasil->alasan; ?>. Oleh karena itu, diharapkan melakukan perbaikan SPM untuk dapat diajukan kembali ke KPPN Solok.<br>
Bersama ini juga kami sampaikan bahwa <b><?php echo $hasil->pesan; ?>.</b><br><br>

<span style="margin-left: 1cm"></span>Demikian kami sampaikan, atas perhatian Bapak/Ibu kami ucapkan terimakasih.</p>
<br><br>
	<p id="ttd">
	<span style="margin-left: -0cm;"></span>Kepala Kantor<br>
	<?php echo $hasil->status_kepala; echo " "; echo $hasil->ket_jabatan_kepala; ?><br><br><br>

	<?php echo $hasil->nama_kepala; ?><br>
	NIP <?php echo $hasil->nip_kepala; ?>
</p>
</body>

<!-- batas akhir php atas -->
<?php }
 ?>
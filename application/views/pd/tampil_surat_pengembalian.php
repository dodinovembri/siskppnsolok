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
<span id="head2">DIREKTORAT JENDRAL PERBENDAHARAAN<br>
KANTOR WILAYAH PROVINSI SUMATERA BARAT<br>
KANTOR PELAYANAN PERBENDAHARAAN NEGARA SOLOK</b></span>
<br>
<span id="head3">Jl. Raya Kotobaru Solok km.5 kodepos 27362 Telepon (0755) 20501 & 21632 Faksimile: (0755) 20501<br>
Email:kppnsolok090@gmail.com</span></span></p>
</td>
</tr>
</table> 
<hr id="hr">
<table id="atas">
	<tr>
	<td id="no">
		Nomor <span style="margin-left: 0.45cm">:</span> S-<?php echo $no_surat; ?>/WPB.03/KP.090/<?php echo $this->session->userdata('tahun_anggaran'); ?>
	</td>
	<td id="tgl">
		<?php echo tanggal_indo($tanggal_surat); ?>
	</td>
</tr>
<tr>
	<td id="no">		
		Lampiran :</span> <?php echo $lampiran; ?> Berkas<br>
	</td>
</tr>
<tr>
	<td id="no">
		Perihal <span style="margin-left: 0.42cm">:</span> Pengembalian Surat Keterangan Penghentian Pembayaran  (SKPP)<br><span style="margin-left: 2cm"></span> a.n <?php echo $pengembalian_atas_nama; ?>
	</td>
</tr>
</table>
<br>
<p id="badan">
Yth. KPA <?php echo $kepada; ?><br>
Di <?php echo $tempat; ?> 
<br><br>
<span style="margin-left: 1cm"></span>Sehubungan dengan Surat Keterangan Penghentian Pembayaran (SKPP) a.n <?php echo $pengembalian_atas_nama; ?> Nomor <?php echo $no_surat_pengajuan; ?> tanggal <?php echo tanggal_indo($tanggal_pengajuan); ?>, dengan ini kami kembalikan SKPP dimaksud dikarenakan <?php echo $alasan; ?><br><br>

Selanjutnya SKPP dapat di ajukan kembali ke KPPN Solok setelah dilakukan perbaikannya.<br><br>
<span style="margin-left: 1cm"></span>Demikian disampaikan, atas perhatian dan kerjasamanya di ucapkan terimakasih.</p>
<br><br>
	<p id="ttd">
	<span style="margin-left: -0cm;"></span>Kepala Kantor<br>
	<?php echo $status_kepala; echo " "; echo $ket_jabatan_kepala; ?><br><br><br>

	<?php echo $nama_kepala; ?><br>
	NIP <?php echo $nip_kepala; ?>
</p>
</body>
<?php 
foreach ($vera as $hasil) { ?>
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
		line-height: 1.5;
	}
	#badan1{
		text-align: justify;
		line-height: 1.5;
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
<span id="head3">Jl. Raya Kotobaru Solok km.5 kodepos 27362 Telepon (0755) 20501 & 21632 Faksimile (0755) 20501<br>
Email:kppnsolok090@gmail.com</span></span></p>
</td>
</tr>
</table> 
<hr id="hr">
<table id="atas">
	<tr>
	<td id="no">
		Nomor <span style="margin-left: 0.86cm">:</span> S-<?php echo $hasil->no_surat; ?>/WPB.03/KP.090/<?php echo $this->session->userdata('tahun_anggaran'); ?>
	</td>
	<td id="tgl">
		<?php echo tanggal_indo($hasil->tanggal_surat); ?>
	</td>
</tr>
<tr>
	<td id="no">		
		Sifat <span style="margin-left: 1.25cm">:</span> 
	</td>
</tr>
<tr>
	<td id="no">
		Lampiran <span style="margin-left: 0.4cm">:</span> <br>
	</td>
</tr>
<tr>
	<td id="no">
		Hal <span style="margin-left: 1.44cm">:</span> Pemberitahuan Pengenaan Sanksi<br>
	</td>
</tr>
</table>
<br>
<p id="badan1">
<span style="margin-left: 0cm"></span>Yth. <br>
Kuasa Pengguna Anggaran<br>
<?php echo $hasil->kepada; ?><br>
Di<br>
Tempat
<br></p>
<p id="badan">
<span style="margin-left: 1cm"></span>Berdasarkan catatan dalam pembukuan dan usulan UAKKBUN KPPN dapat dikemukakan bahwa <?php echo $hasil->kepada; ?> yang saudara pimpin belum melaksanakan rekonsiliasi/lpj sesuai dengan ketentuan yang berlaku sehinggga Kantor/Satuan Kerja saudara kami berikan sanksi <?php echo $hasil->sanksi; ?> penerbitan SP2D atas Surat Perintah Membayar (SPM) yang diajukan, kecuali SPM Belanja Pegawai, SPM LS dan SPM Pengembalian.<br><br>
<span style="margin-left: 1cm"></span>Pengenaan sanksi dimaksud berlaku sampai Kantor/Satuan Kerja Saudara memenuhi kewajiban melaksanakan rekonsiliasi/lpj sebagaimana di tetapkan dalam Bab VI Pasal 46 peraturan Menteri Keuangan nomor PER 213/PMK.05/2013 tentang Sistem Akuntansi dan Pelaporan Pemerintah Pusat<br><br>
<span style="margin-left: 1cm"></span>Demikian kami sampaikan, atas perhatian Bapak/Ibu kami ucapkan terimakasih.</p>
<br><br>
	<p id="ttd">Kepala Kantor<br>
	<?php echo $hasil->status_kepala; echo " "; echo $hasil->ket_jabatan_kepala; ?><br><br><br>

	<?php echo $hasil->nama_kepala; ?><br>
	NIP <?php echo $hasil->nip_kepala; ?>
</p>
<br><br><br><br><br><br><br><br>
Tembusan:<br>
1. Direktur Akuntanni dan Pelaporan Keuangan<br>
2. Direktur Pengelolaan Kas Negara
</body>

<!-- batas akhir php atas -->
<?php }
 ?>
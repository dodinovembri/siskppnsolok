<?php 
foreach ($bank as $hasil) { ?>
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
		Nomor <span style="margin-left: 0.9cm">:</span> S-<?php echo $hasil->no_surat; ?>/WPB.03/KP.090/<?php echo $this->session->userdata('tahun_anggaran'); ?>	
	</td>
	<td id="tgl">
		<?php echo tanggal_indo($hasil->tanggal_surat); ?>
	</td>
</tr>
<tr>
	<td id="no">		
		Sifat <span style="margin-left: 1.26cm">:</span> Sangat Segera
	</td>
</tr>
<tr>
	<td id="no">
		Lampiran <span style="margin-left: 0.4cm">:</span> 1 (satu) lembar<br>
	</td>
</tr>
<tr>
	<td id="no">
		Hal <span style="margin-left: 1.45cm">:</span> Pemberitahuan Retur SP2D<br>
	</td>
</tr>
</table>
<br>
<p id="badan1">
<span style="margin-left: 0cm"></span>Yth. <?php echo $hasil->satker; echo" "; echo $hasil->kepada; echo " "; echo " ("; echo $hasil->kode; echo ") "; ?><br>
<span style="margin-left: 0.8cm"></span>Di<br>
<span style="margin-left: 1.1cm"></span>Koto Baru</b>
<br><br></p>
<p id="badan">
<span style="margin-left: 1cm"></span>Sesuai dengan peraturan Direktur Jenderal Perbendaharaan Nomor PER-30/PB/2014 tentang Mekanisme Penyelesaian dan Penatausahaan Retur Surat Perintah Pencairan Dana Dalam Rangka Implementasi Sistem Perbendaharaan dan Anggaran Negara bersama ini kami sampaikan hal-hal sebagai berikut:<br>
<table id="badan">
	<tr>
		<td valign="top">1.</td>
		<td>Terdapat dana SP2D <?php echo $hasil->kepada; echo " ("; echo $hasil->kode; echo ") "; ?> yang diretur oleh <?php echo $hasil->bank_retur; ?> penerima atas data SP2D sesuai Daftar Retur terlampir,</td>
	</tr>
	<tr>
		<td valign="top">2.</td>
		<td>
			Berkenaan dengan hal sebagaimana dimaksud pada angka 1, diminta kepada saudara untuk
			<table id="badan">
			<tr>
				<td valign="top">a.</td>
				<td>
					Melakukan perbaikan data pada sistem aplikasi yang digunakan.
				</td>
			</tr>
			<tr>
				<td valign="top">b.</td>
				<td>
					Menyampaikan Surat Ralat/Perbaikan Rekening berdasarkan perbaikan data sebagaimana dimaksud pada huruf a dengan dilampiri dokumen dan/atau ADK ke KPPN sesuai ketentuan Peraturan Direktur Jenderal Perbendaharaan Nomor PER-30/PB/2014 tentang Mekanisme Penyelesaian dan Penatausahaan Retur Surat Perintah Pencairan Dana Dalam Rangka Implementasi Sistem Perbendaharaan dan Anggaran Negara.
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top">3.</td>
		<td>
			Penyampaian Surat Ralat/Perbaikan Rekening berikut lampiran sebagaimana dimaksud pada angka 3 agar dilakukan paling lambat tanggal 7(tujuh) hari kerja setelah tanggal surat ini yaitu tanggal <?php echo tanggal_indo($hasil->tanggal_ralat); ?>.
		</td>
	</tr>
	<tr>
		<td valign="top">4.</td>
		<td>
			Selanjutnya, saudara agar lebih teliti dalam pencantuman nama, nomor rekening dan/atau Bank pada SPM.
		</td>
	</tr>
</table>
<span style="margin-left: 1cm"></span>Demikian kami sampaikan, atas perhatian Bapak/Ibu kami ucapkan terimakasih.</p>
<br><br>
	<p id="ttd">
	Kepala Kantor<br><br><br><br>

	Junaidi<br>
	NIP 19790305 20
</p>
<!-- </body> -->


<!-- batas akhir php atas -->
<?php }
 ?>
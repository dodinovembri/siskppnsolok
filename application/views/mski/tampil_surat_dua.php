<?php 
foreach ($ptup as $hasil) { ?>
<!-- batas awal pembukaan php -->

<?php 
function terbilang($bilangan) {

  $angka = array('0','0','0','0','0','0','0','0','0','0',
                 '0','0','0','0','0','0');
  $kata = array('','satu','dua','tiga','empat','lima',
                'enam','tujuh','delapan','sembilan');
  $tingkat = array('','ribu','juta','milyar','triliun');

  $panjang_bilangan = strlen($bilangan);

  /* pengujian panjang bilangan */
  if ($panjang_bilangan > 15) {
    $kalimat = "Diluar Batas";
    return $kalimat;
  }

  /* mengambil angka-angka yang ada dalam bilangan,
     dimasukkan ke dalam array */
  for ($i = 1; $i <= $panjang_bilangan; $i++) {
    $angka[$i] = substr($bilangan,-($i),1);
  }

  $i = 1;
  $j = 0;
  $kalimat = "";


  /* mulai proses iterasi terhadap array angka */
  while ($i <= $panjang_bilangan) {

    $subkalimat = "";
    $kata1 = "";
    $kata2 = "";
    $kata3 = "";

    /* untuk ratusan */
    if ($angka[$i+2] != "0") {
      if ($angka[$i+2] == "1") {
        $kata1 = "seratus";
      } else {
        $kata1 = $kata[$angka[$i+2]] . " ratus";
      }
    }

    /* untuk puluhan atau belasan */
    if ($angka[$i+1] != "0") {
      if ($angka[$i+1] == "1") {
        if ($angka[$i] == "0") {
          $kata2 = "sepuluh";
        } elseif ($angka[$i] == "1") {
          $kata2 = "sebelas";
        } else {
          $kata2 = $kata[$angka[$i]] . " belas";
        }
      } else {
        $kata2 = $kata[$angka[$i+1]] . " puluh";
      }
    }

    /* untuk satuan */
    if ($angka[$i] != "0") {
      if ($angka[$i+1] != "1") {
        $kata3 = $kata[$angka[$i]];
      }
    }

    /* pengujian angka apakah tidak nol semua,
       lalu ditambahkan tingkat */
    if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
        ($angka[$i+2] != "0")) {
      $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
    }

    /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
       ke variabel kalimat */
    $kalimat = $subkalimat . $kalimat;
    $i = $i + 3;
    $j = $j + 1;

  }

  /* mengganti satu ribu jadi seribu jika diperlukan */
  if (($angka[5] == "0") AND ($angka[6] == "0")) {
    $kalimat = str_replace("satu ribu","seribu",$kalimat);
  }

  return trim($kalimat);
} 

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
		line-height: 1.2;
		margin-left: 0.5cm;
	}
	#badan2{
		text-align: justify;
		font-family: arial;
		font-size: 11pt;
		line-height: 1.2;
	}
	#badan1{
		text-align: justify;
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
			<span id="head2">DIREKTORAT JENDERAL PERBENDAHARAAN<br>KANTOR WILAYAH PROVINSI SUMATERA BARAT<br>KANTOR PELAYANAN PERBENDAHARAAN NEGARA SOLOK</b></span><br>
			<span id="head3">Jl. Raya Kotobaru Solok km.5 kodepos 27362 Telepon (0755) 20501 & 21632 Faksimile: (0755) 20501<br> Email:kppnsolok090@gmail.com</span></p></b>
	</td>
</tr>
</table> 
<hr id="hr">
<table id="atas">
	<tr>
	<td id="no">
		Nomor <span style="margin-left: 0.45cm">:</span> S- <?php echo $hasil->no_surat; ?> /WPB.03/KP.090/<?php echo $this->session->userdata('tahun_anggaran'); ?>
	</td>
	<td id="tgl">
		<?php echo tanggal_indo($hasil->tanggal_surat); ?>
	</td>
</tr>
<tr>
	<td id="no">		
		Sifat <span style="margin-left: 0.83cm">:</span> Segera
	</td>
</tr>
<tr>
	<td id="no">
		Perihal <span style="margin-left: 0.4cm">:</span> Persetujuan Tambahan Uang Persediaan (RM)<br>
	</td>
</tr>
</table>
<br>
<p id="badan1">
<span style="margin-left: 0cm"></span>Kepada Yth<br>
Kuasa Pengguna Anggaran<br>
<?php echo $hasil->kepada;?> (<?php echo $hasil->kode; ?>)<br>
di <?php echo $hasil->tempat; ?>
<br></p>
<table id="badan">
	<tr>
		<td valign="top">1.</td>
		<td>Dasar
		<table id="badan2">
			<tr>
				<td valign="top">a.</td>
				<td>
					Peraturan Menteri Keuangan RI nomor 190/PMK.05/2012 tentang tata cara Pembayaran Dalam Rangka Pelaksanaan Anggaran Pendapatan Dan Belanja Negara.
				</td>
			</tr>
			<tr>
				<td valign="top">b.</td>
				<td>
					Surat Permohonan Persetujuan (TUP) dari Kuasa Pengguna Kuasa Anggaran nomor <?php echo $hasil->no_surat_pengajuan; ?> tanggal <?php echo tanggal_indo($hasil->tanggal_pengajuan); ?> tentang Tambahan Uang Persediaan.
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td valign="top">2.</td>
		<td>
			Sehubungan dengan butir 1 tersebut diatas, dengan ini di berikan persetujuan Tambahan Uang Persediaan sebesar <?php echo $hasil->jumlah_uang; ?>,- ( <?php echo terbilang($hasil->jumlah_uang );?> rupiah ) untuk keperluan medesak Satuan Kerja <?php echo $hasil->kepada; ?> kode <?php echo $hasil->kode; ?> atas beban DIPA TA 2018 nomor <?php echo $hasil->no_beban; ?> Tanggal <?php echo tanggal_indo($hasil->tanggal_ketetapan_beban); ?>.
		</td>
	</tr>
	<tr>
		<td valign="top">3.</td>
		<td>
			Tambahan Uang Persediaan  tersebut tidak dapat digunakan untuk membiayai pengeluaran yang menurut ketentuan harus dilakukan dengan Pembayaran Langsung (LS) dan hanya berlaku untuk saat ini serta tidak dapat di isi ulang (revolving).
		</td>
	</tr>
	<tr>
		<td valign="top">4.</td>
		<td>
			Tambahan Uang Persediaan tersebut digunakan untuk paling lama 1 (satu) bulan sejak tanggal SP2D diterbitkan. Apabila Tambahan Uang Persediaan tersebut tidak habis dalam satu bulan, maka sisa dana yang ada pada Bendahara Pengeluaran harus disetorkan ke Kas Negara.
		</td>
	</tr>
	<tr>
		<td valign="top">5.</td>
		<td>
			Pembayaran yang dilakukan oleh Bendahara Pengeluaran kepada penerima tagihan tidak boleh melebihi Rp. 50.000.000,- (lima puluh juta rupiah) kecuali untuk pembayaran honor dan perjalanan dinas.
		</td>
	</tr>
	<tr>
		<td valign="top">6.</td>
		<td>
			Tata cara pencairan, pembayaran, penggunaan, pertanggungjawaban dan pelaporan realisasi dana APBN agar berpedoman pada Peraturan Menteri Keuangan RI nomor 190/PMK.05/2012 tentang tata cara Pembayaran Dalam Rangka Pelaksanaan Anggaran Pendapatan dan Belanja Negara.
		</td>
	</tr>
</table><br>
Demikian untuk menjadi perhatian.</p>
	<p id="ttd">Kepala Kantor<br>
	<?php echo $hasil->status_kepala; echo " "; echo $hasil->ket_jabatan_kepala; ?><br><br><br><br>

	<?php echo $hasil->nama_kepala; ?><br>
	NIP <?php echo $hasil->nip_kepala; ?>
</p>
</body>


<!-- batas akhir php atas -->
<?php }
 ?>
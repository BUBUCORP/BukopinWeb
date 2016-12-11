<?php 
$date = date('Y-m-d');			
$expiredate = date('d F Y', strtotime("+14 days"));
?>
<div style=" position: relative;padding: 30px;font-size: 13px;">
<h1 style="text-align: center;">Form Pembukaan Rekening</h3><br><br>
<p >
Kepada Yth,<br>
Bapak/Ibu <?=$nama_lengkap;?><br><br><br>
Terima kasih atas kepercayaan anda untuk membuka rekening di Bank Bukopin.<br>Kami menunggu kedatangan Bapak/Ibu di kantor Bank Bukopin terdekat dengan membawa/menunjukan kode referensi di bawah ini atau staff kami akan menghubungi Bapak/Ibu pada kesempatan Pertama.<br>
</p>
<h1 style="text-align: center; font-weight: bold;"><?=$no_tiket_rek?></h1><br>
<p style="text-align: center;">
	Tanggal Terbit : <?=date("d F Y")?> <br>
	Tanggal Kadaluarsa : <?=$expiredate?> <br>
</p>
Persyaratan pembukaan rekening<br><br>
1. Identitas Diri(KTP Elektronik)<br>
2. Identitas Pendukung(NPWP/SIM)<br>
3. Untuk Identitas Diri(KTP Elektronik) yang tidak sesuai dengan domisili, maka pemohonan wajib melengkapi dengan surat keterangan kerja atau surat keterangan domisili dari kelurahan setempat.<br>
<br>
<br>
<br>
<br>
Hormat Kami,<br>
<br>								
PT Bank Bukopin, Tbk<br>
</p>
</div>
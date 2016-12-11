<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=datacontact.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="100%">
<tr>
  <th>No</th>
  <th>tanggal</th>
  <th>no_tiket</th>
  <th>cat_contact</th>
  <th>nama_lengkap</th>
  <th>no_identitas</th>
  <th>no_identitas_bank</th>
  <th>email</th>
  <th>phone</th>
  <th>alamat</th>
  <th>subject</th>
  <th>jenis_masalah</th>
  <th>pesan</th>
  
</tr>
<?php $no=1; foreach($list as $item){ ?>
<tr>
  <td><?php echo $no++;?></td>
  <td><?php echo $item['tanggal']; ?></td>
  <td><?php echo $item['no_tiket']; ?></td>
  <td><?php echo $item['cat_contact']; ?></td>
  <td><?php echo $item['nama_lengkap']; ?></td>
  <td><?php echo $item['no_identitas']; ?></td>
  <td><?php echo $item['no_identitas_bank']; ?></td>
  <td><?php echo $item['email']; ?></td>
  <td><?php echo $item['phone']; ?></td>
  <td><?php echo $item['alamat']; ?></td>
  <td><?php echo $item['subject']; ?></td>
  <td><?php echo $item['jenis_masalah']; ?></td>
  <td><?php echo $item['pesan']; ?></td>
</tr>
<?php } ?>
</table>

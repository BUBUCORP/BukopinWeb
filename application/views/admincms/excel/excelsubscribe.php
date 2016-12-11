<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=datasubscribe.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="100%">
<tr>
  <td>No</td>
  <td>Email</td>
  <td>Name</td>
  <td>Status</td>
</tr>
<?php foreach($list as $item) { ?>
<tr>
  <td><?php echo $item['id_subscribe'];?></td>
  <td><?php echo $item['email'];?></td>
  <td><?php echo $item['name'];?></td>
  <td><?php echo $item['status'];?></td>
</tr>
<?php } ?>
</table>

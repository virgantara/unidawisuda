<?php
header("Content-type: application/excel");
header("Content-Disposition: attachment; filename=datawisuda.xls");
header('Cache-Control: max-age=0');
?>


<table border="1px">
<tr>
<th>NIM</th>
<th>Nama Lengkap</th>
<th>Kampus</th>
<th>KMI</th>
<th>Fakultas</th>
<th>Prodi</th>
<th>TTL</th>
<th>Jenis Kelamin</th>
<th>Status Warga</th>
<th>Warga Negara</th>
<th>Alamat</th>
<th>Telp</th>
<th>Nama Ayah</th>
<th>Pekerjaan Ayah</th>
<th>Nama Ibu</th>
<th>Pekerjaan Ibu</th>
</tr>
<?php


foreach($model as $m)
{

?>
	
<tr>
<td><?php echo $m->nim;?></td>
<td><?php echo $m->nama_lengkap;?></td>
<td><?php echo $m->kampus;?></td>
<td><?php echo $m->kmi;?></td>
<td><?php echo $m->fakultas;?></td>
<td><?php echo $m->prodi;?></td>
<td><?php echo $m->tempat_lahir.', '.$m->tanggal_lahir;?></td>
<td><?php echo $m->jenis_kelamin;?></td>
<td><?php echo $m->status_warga;?></td>
<td><?php echo $m->warga_negara;?></td>
<td><?php echo $m->alamat;?></td>
<td><?php echo $m->no_telp;?></td>
<td><?php echo $m->nama_ayah;?></td>
<td><?php echo $m->pekerjaan_ayah;?></td>
<td><?php echo $m->nama_ibu;?></td>
<td><?php echo $m->pekerjaan_ibu;?></td>
</tr>

<?php 
}
?>

</table>

	<?php if (empty($tgl_mulai) && !empty($tgl_sampai) && !empty($result)) { ?>
		<div class="alert alert-dismissible alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p class="mb-0">Tanggal periode belum ditentukan dengan benar</p>
		</div>
		
	<?php } else if (empty($tgl_mulai) && !empty($tgl_sampai) && empty($result)) { ?>
		
	<?php } else if (!empty($tgl_mulai) && empty($tgl_sampai) && empty($result)) { ?>
		<div class="alert alert-dismissible alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p class="mb-0">Tanggal periode belum ditentukan dengan benar</p>
		</div>
		

	<?php } else if (empty($tgl_mulai) && empty($tgl_sampai) && empty($result)) { ?>
		<div class="alert alert-dismissible alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p class="mb-0">Tanggal periode belum ditentukan dengan benar</p>
		</div>
		
	<?php } else if (!empty($tgl_mulai) && !empty($tgl_sampai) && empty($result)) { ?>
		
		<h4 align="center">Rekap Laporan</h4>
		<p>Tanggal <strong><?=date('d/m/Y', strtotime($tgl_mulai));?></strong> s.d <strong><?=date('d/m/Y', strtotime($tgl_sampai));?></strong></p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Tanggal Nota</th>
					<th scope="col">Tanggal Input</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Jenis</th>
					<th scope="col">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="5" align="center">Tidak ada data</td>
				</tr>
			</tbody>
		</table>
	<?php } else if (!empty($tgl_mulai) && !empty($tgl_sampai) && !empty($result)) { ?>
	<br>
		<p><a href="<?=base_url('laporan');?>"><button type="button" class="btn btn-primary">Kembali ke Laporan</button></a></p>
		<h4>Rekap Laporan</h4>
		<p>Tanggal <strong><?=date('d/m/Y', strtotime($tgl_mulai));?></strong> s.d <strong><?=date('d/m/Y', strtotime($tgl_sampai));?></strong></p>
		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Tanggal Nota</th>
					<th scope="col">Tanggal Input</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Jenis</th>
					<th scope="col">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($result1 as $data) { ?>
					<td><?=$data->nomor;?></td>
					<td><?=$data->keterangan;?></td>
					<td><?=date('d/m/Y', strtotime($data->tanggal));?></td>
					<td><?=$data->tanggal_nota;?></td>
					<td>Rp <?=number_format($data->jumlah,2,',','.');?></td>
					<td><?=ucwords($data->jenis);?></td>
				</tr>
			<?php } ?>
			</tbody>
			<thead>
			<?php
				error_reporting(0);
				foreach ($ttl_masuk as $total_masuk) {
					$jumlah_masuk += $total_masuk->jumlah;
				}
				foreach ($ttl_keluar as $total_keluar) {
					$jumlah_keluar += $total_keluar->jumlah;
				}
				$jumlah = $jumlah_masuk-$jumlah_keluar;
			?>
				<tr>
					<th colspan="3" scope="col">TOTAL <small>(Pemasukan dan Pengeluaran Tanggal <?=date('d/m/Y', strtotime($tgl_mulai));?> s.d <?=date('d/m/Y', strtotime($tgl_sampai));?>)</small></th>
					<th></th>
					<th scope="col">Rp. <?=number_format($jumlah,2,',','.');?></th>
					<th colspan="2" scope="col">&nbsp;</th>
				</tr>
			</thead>
		</table>
		<p>Tanggal <strong><?=date('d/m/Y', strtotime($tgl_mulai));?></strong> s.d <strong><?=date('d/m/Y', strtotime($tgl_sampai));?></strong></p>
		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Tanggal Nota</th>
					<th scope="col">Tanggal Input</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Jenis</th>
					<th scope="col">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($result as $data) { ?>
				<tr>
				<td><?=$data->nomor;?></td>
					<td><?=$data->keterangan;?></td>
					<td><?=date('d/m/Y', strtotime($data->tanggal));?></td>
					<td><?=$data->tanggal_nota;?></td>
					<td>Rp <?=number_format($data->jumlah,2,',','.');?></td>
					<td><?=ucwords($data->jenis);?></td>
				</tr>
			<?php } ?>
			</tbody>
			<thead>
				<?php
				error_reporting(0);
				foreach ($ttl_hutang as $total_hutang) {
					$jumlah_hutang += $total_hutang->jumlah;
				}
			?>
				<tr>
					<th colspan="3" scope="col">TOTAL <small>(Hutang <?=date('d/m/Y', strtotime($tgl_mulai));?> s.d <?=date('d/m/Y', strtotime($tgl_sampai));?>)</small></th>
					<th></th>
					<th scope="col">Rp. <?=number_format($jumlah_hutang,2,',','.');?></th>
					<th colspan="2" scope="col">&nbsp;</th>
				</tr>
			</thead>
			<thead>
				<?php
				error_reporting(0);
				foreach ($ttl_piutang as $total_piutang) {
					$jumlah_piutang += $total_piutang->jumlah;
				}
			?>
				<tr>
					<th colspan="3" scope="col">TOTAL <small>(Piutang <?=date('d/m/Y', strtotime($tgl_mulai));?> s.d <?=date('d/m/Y', strtotime($tgl_sampai));?>)</small></th>
					<th></th>
					<th scope="col">Rp. <?=number_format($jumlah_piutang,2,',','.');?></th>
					<th colspan="2" scope="col">&nbsp;</th>
				</tr>
			</thead>
		</table>
		<p>
<script src="jquery_hotkeys/jquery-1.4.2.js"></script>
<script src="jquery_hotkeys/jquery.hotkeys.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
    $(document).bind('keydown', 'ctrl + P', function() {
        alert('Print');
    });
  });
</script>  
		<a><button type="button" class="btn btn-primary">CRTL + P</button></a></p>
	<?php 
		echo $halaman; 
	} 
	?>

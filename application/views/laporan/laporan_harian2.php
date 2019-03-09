<br>
	<?php if (empty($tanggal) && empty($result)) { ?>
		<div class="alert alert-dismissible alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p class="mb-0">Tanggal harian belum ditentukan</p>
		</div>
		<p><a href="<?=base_url('laporan');?>"><button type="button" class="btn btn-primary">Kembali ke Laporan</button></a></p>
	<?php } else if (!empty($tanggal) && empty($result)) { ?>
		<p><a href="<?=base_url('laporan');?>"><button type="button" class="btn btn-primary">Kembali ke Laporan</button></a></p>
		<h4>Laporan Harian</h4>
		<p>Tanggal <strong><?=$tanggal;?></strong></p>
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
				<tr>
					<td colspan="6" align="center">Tidak ada data</td>
				</tr>
			</tbody>
		</table>
	<?php } else if (!empty($tanggal) && !empty($result)) { ?>
	<br>
		<p><a href="<?=base_url('laporan');?>"><button type="button" class="btn btn-primary">Kembali ke Laporan</button></a></p>
		<h4>Laporan Harian</h4>
		<p>Tanggal <strong><?=date('d/m/Y', strtotime($tanggal));?></strong></p>
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
					<td>Rp <?=number_format($data->jumlah,2,',','.');?></td>
					<td><?=$data->tanggal_nota;?></td>
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
	<?php
		echo $halaman;
	}
	?>

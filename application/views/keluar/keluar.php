
<h4>Daftar Pengeluaran</h4>
	<?php if ($this->session->flashdata('message')) { ?>
		<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p class="mb-0"><?php echo $this->session->flashdata('message');?></p>
		</div>
	<?php } ?>
<?php if($this->session->userdata('level')=='1'):?>
<p><a href="<?=base_url('keluar/pengeluaran');?>"><button type="submit" class="btn btn-primary">Tambah Pengeluaran</button></a></p>
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Nomor</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Tanggal Nota</th>
			<th scope="col">Tanggal Input</th>
			<th scope="col">Jumlah</th>
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
			<td>
				<a href="<?=base_url('keluar/ubah_pengeluaran/'.$data->nomor);?>"><span class="badge badge-pill badge-primary">Ubah</span></a> &nbsp; 
				<a href="<?=base_url('keluar/hapus_pengeluaran/'.$data->nomor);?>"><span class="badge badge-pill badge-danger">Hapus</span></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<thead>
	<?php
		error_reporting(0);
		foreach ($ttl as $total) {
			$jumlah += $total->jumlah;
		}
	?>
		<tr>
			<th colspan="3" scope="col">TOTAL <small>(Pengeluaran)</small></th>
			<th></th>
			<th scope="col">Rp. <?=number_format($jumlah,2,',','.');?></th>
			<th scope="col">&nbsp;</th>
		</tr>
	</thead>
</table>
<?php elseif($this->session->userdata('level')=='2'):?>
<p><a href="<?=base_url('keluar/pengeluaran');?>"><button type="button" class="btn btn-primary">Tambah Pengeluaran</button></a></p>
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Nomor</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Tanggal Nota</th>
			<th scope="col">Tanggal Input</th>
			<th scope="col">Jumlah</th>
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
			<td>
				<a href="<?=base_url('keluar/ubah_pengeluaran/'.$data->nomor);?>"><span class="badge badge-pill badge-primary">Ubah</span></a>
			</td>
		</tr>
	<?php } ?>
	<thead>
	<?php
		error_reporting(0);
		foreach ($ttl as $total) {
			$jumlah += $total->jumlah;
		}
	?>
		<tr>
			<th colspan="3" scope="col">TOTAL <small>(Pengeluaran)</small></th>
			<th></th>
			<th scope="col">Rp. <?=number_format($jumlah,2,',','.');?></th>
			<th scope="col">&nbsp;</th>
		</tr>
	</thead>
</table>
<?php endif;?>
<?=$halaman;?>

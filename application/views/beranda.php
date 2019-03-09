<?php if ($this->session->flashdata('message')) { ?>
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p class="mb-0"><?php echo $this->session->flashdata('message');?></p>
	</div>
<?php } ?>
<h4>Selamat Datang, <strong><?=$this->session->userdata('name');?></strong></h4>
<p><strong>Hello Web</strong> adalah aplikasi berbasis web sederhana yang dapat digunakan untuk mengontrol keuangan dengan mudah.</p>
<div class="row">
  <div class="col-sm-6" align="center">
    <div class="card">
      <div class="card-body bg-info text-light">
        <h5 class="card-title"><strong>SISA SALDO</strong></h5>
        <h4 class="card-text"><?php
                    $query = $this->db->query("SELECT ROUND ( SUM(IF(jenis = 'masuk', jumlah, 0))-(SUM(IF( jenis = 'keluar', jumlah, 0))) ) AS subtotal FROM data");

                    foreach ($query->result_array() as $rows) {
                      $dwet = $rows['subtotal'];
                      $arto = number_format($dwet,0,",",".");
                       echo "<div class='number'><b>Rp. $arto</b></div>";
                     } 
                 ?></h4>
      </div>
    </div>
  </div>
  <div class="col-sm-6" align="center">
    <div class="card">
      <div class="card-body bg-success text-light">
        <h5 class="card-title"><strong>PEMASUKAN</strong></h5>
        <h4 class="card-text"><?php
                    $mlebu = $this->db->query("SELECT jenis , SUM(jumlah) AS masuk FROM data WHERE jenis = 'masuk'")->result_array();
                    foreach ($mlebu as $anu) {
                        $a = $anu['masuk'];
                        $b = number_format($a,0,",",".");
                        echo "<div class='number'><b>Rp. $b</b></div>";
                    }
                ?></h4>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6" align="center">
    <div class="card">
      <div class="card-body bg-danger text-light">
        <h5 class="card-title"><strong>PENGELUARAN</strong></h5>
        <h4><?php
                    $mlebu = $this->db->query("SELECT jenis , SUM(jumlah) AS keluar FROM data WHERE jenis = 'keluar'")->result_array();
                    foreach ($mlebu as $anu) {
                        $a = $anu['keluar'];
                        $b = number_format($a,0,",",".");
                        echo "<div class='number'><b>Rp. $b</b></div>";
                    }
                ?>
              </h4>
      </div>
    </div>
  </div>
<br>
  <div class="col-sm-6" align="center">
    <div class="card">
      <div class="card-body bg-warning text-light">
        <h5 class="card-title"><strong>TOTAL HUTANG</strong></h5>
        <h4><?php
                    $mlebu = $this->db->query("SELECT jenis , SUM(jumlah) AS hutang FROM data1 WHERE jenis = 'hutang'")->result_array();
                    foreach ($mlebu as $anu) {
                        $a = $anu['hutang'];
                        $b = number_format($a,0,",",".");
                        echo "<div class='number'><b>Rp. $b</b></div>";
                    }
                ?>
              </h4>
      </div>
    </div>
  </div>
</div>
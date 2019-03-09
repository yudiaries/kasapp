<br>
<br>
<br>
<br>
<br>
<br>
<h4  class="col-sm-9 col-md-7 col-lg-5 mx-auto" align="center"><strong>Silahkan Login</strong></h4>

	<?php if ($this->session->flashdata('message')) { ?>
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p class="mb-0"><?php echo $this->session->flashdata('message');?></p>
		</div>
	<?php } ?>

<form action="<?=base_url('home/login');?>" method="POST" align="center">
	<div class="form-group" align="center">
		<input type="text" class="form-control w-25 p-3" name="username" placeholder="Username" id="username" required="" >
	</div>
	<div class="form-group" align="center">
		<input type="password" class="form-control w-25 p-3" name="password" placeholder="password" id="password" required="">
	</div>
	<button type="submit" class="btn btn-primary w-25 p-3" align="center">Login</button>
</form>
<br />
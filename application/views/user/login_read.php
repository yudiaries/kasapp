<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:10px" align="left">Detail User</h2>
        <table class="table table-hover">
	    <tr><td>Name</td><td>:</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Username</td><td>:</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td>:</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Level</td><td>:</td><td><?php echo $level; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-success">Kembali</a></td></tr>
	</table>
        </body>
</html>
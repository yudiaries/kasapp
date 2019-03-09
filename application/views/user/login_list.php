<div class="box-header">
    <h4 class="box-title">KELOLA DATA USER</h4>
</div>
        
    <div class="box-body">
        <div class='row col-md-9'>
        <div style="padding-bottom: 10px;"'>
            <?php echo anchor(site_url('user/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>    
            </div>
        </div>
        <div>
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
        </div>
        <table class="table table-hover bordered" width="100px" style="text-align:left;">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Action</th>
            </tr>
            </thead>
            <?php foreach ($user_data as $user)
            {
                ?>
                <tr>
			<td width="100px"><?php echo ++$start ?></td>
			<td><?php echo $user->name ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->password ?></td>
			<td><?php echo $user->level ?></td>
			<td style="text-align:left;" width="200px">
				<?php 
				echo anchor(site_url('user/update/'.$user->id_user),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit','class="badge badge-pill badge-primary"'); 
				echo '  '; 
                echo '  '; 
				echo anchor(site_url('user/delete/'.$user->id_user),'<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus','class="badge badge-pill badge-danger" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                echo '  ';
                echo '  ';
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">   
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
        </div>
    </section>
</div>

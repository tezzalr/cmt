<div id="" class="content" style="margin-right:20px">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h2 style="">All User Log</h2>
	</div>
	<div>
		<table class="table table-bordered">
			<thead>
				<tr class="headertab"><th>No</th><th>Nama</th><th>Role</th></tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($logs as $log){?>
				<tr id="usersu_<?php echo $log->id?>">
					<td><?php echo $i;?></td>
					<td><?php echo $log->name;?></td>
					<td><?php echo date("d M Y (H:i A)", strtotime($log->login_time));?></td>
				</tr>
				
				<?php $i++; }?>
			</tbody>
		</table>
	</div><div style="clear:both"></div><br>
</div>

<script>
	function delete_user(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"user/delete_user",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#usersu_'+id).animate({'opacity':'toggle'});
							succeedMessage('User berhasil dihapus');
						}
					}
				});
			}
		});
	}
</script>
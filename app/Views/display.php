<div>
    <a href="<?php echo base_url('about')?>">
    <button>insert</button><br><br>
    </a>
</div>

<table  border='1'>
<?php
if (session()->get('msg')) {
    echo "<p>".session()->get('msg')."</p>";
}

?>
	<tr>
        <th>NO.</th>
		<th>email</th>
		<th>update</th>
		<th>delete</th>
	</tr>
	<tr>
    <?php $i=1?>
		<?php foreach ($user as $item) { ?>  
			<tr>   
            <td><?= $i++?></td> 
			<td><?=$item['email']?></td>
			
			<td><a href="<?= base_url('edit/'.$item['id']);?>">update</a></td>
			<td>
				<a href="<?= site_url('delete/'.$item['id']);?>">delete</a>
            </td>
			</tr>
			
		                                                      <?php } ?>
	</tr>
</table>
<section class="list contain">

<?php foreach ($query->result() as $row) { ?>
			
			<div class="reservaties">
                <p >tafel: <?php echo $row->tableid;?></p>
            	<p>aantal personen: <?php echo $row->peoplenr;?></p>
                <P>Beschrijving: <?php echo $row->description;?></p>       
                <div class="edit" id="tableid<?php echo $table->tableid?>"><input type="submit" value="Wijzig"/></div>
				</div>


		<?php } ?>

		<script type="text/javascript">

    $(".edit").on('click',function(){
	var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'tableid' : this.id.replace('tableid',''),
			'resdate' : '<?php echo $resdate;?>',
			'gereserveerd' : 'bezet'
		};
		openWindow('/admin/reservations/form',data);
	});
</script>

</section>
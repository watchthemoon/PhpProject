<h1>Reservation</h1>
<div id="rightside">



	<section>

		<p>Hier ziet u alle reeds geplaatste reservaties.</p>

		<?php foreach ($query->result() as $row) { ?>
				<h2><?php echo $row->date; ?></h2>
				<p><?php echo $row->peoplenr; ?></p>
               
                <form action="/admin/menu/delete" method="post">
                <input type="hidden" name="menuid" value="<?php echo $row->menuid;?>" />
                <input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid;?>" />
                <input type="submit" value="Verwijder" class="delete"/>
				</form>
<?php } ?>

	</section>


</div>

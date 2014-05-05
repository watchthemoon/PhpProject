<section>

<?php foreach ($query->result() as $row) { ?>
				<h2><?php echo $row->name; ?></h2>
				<p><?php echo $row->price; ?></p>
               
                <form action="/admin/menu/delete" method="post">
                <input type="hidden" name="menuid" value="<?php echo $row->menuid;?>" />
                <input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid;?>" />
                <input type="submit" value="Verwijder" class="delete"/>
				</form>

                <input type="hidden" name="menuid" value="<?php echo $row->menuid;?>" />
                <input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid;?>" />
                <input type="submit" value="wijzig" class="wijzig" />
                


		<?php } ?>


<script type="text/javascript">


    $(".wijzig").on('click',function(){
        var data = {
            'restaurantid': '<?php echo $restaurantid;?>'
        };
        openWindow("/admin/menu/wijzigform/<?php echo $row->menuid;?>",data);
});
</script>

        </section>

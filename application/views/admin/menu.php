
<!--<script type="text/javascript">
$(document).ready(function(){    
        $('.super').click(function(){
            $('#menu').fadeOut();
            var a = $(this).attr('id');
            $.post("voorgerechten.php?id="+a, {
            }, function(response){
                //$('#container').html(unescape(response));
                ///$('#container').fadeIn();
                setTimeout("finishAjax('menu', '"+escape(response)+"')", 400);
            });
        });    
    });    
    function finishAjax(id, response){
      $('#'+id).html(unescape(response));
      $('#'+id).fadeIn();
    } </script>
-->

<h1>Menu's</h1>
<div id="rightside">

	<section>

		<p>Hier komen de menu's voor de restauranthouder.</p>

		<button class="toevoegen" id="toevoegen" type="submit">menu toevoegen </button>

	</section>

<script type="text/javascript">
    $(".toevoegen").on('click',function(){
        var data = {
            'restaurantid': '<?php echo $restaurantid;?>'
        };
        openWindow('/admin/menu/wijzigform',data);
    });

    $(".wijzig").on('click',function(){
        var data = {
            'restaurantid': '<?php echo $restaurantid;?>'
        
        };
        openWindow('/admin/menu/form',data);
    });
</script>


<a href="#" class="super voor" id="voorgerechten">Voorgerechten</a>
<a href="#" class="super hoofd" id="hoofdgerechten">Hoofdgerechten</a>
<a href="#" class="super na" id="nagerechten"	>Nagerechten</a>


<div id="menu">

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
                <input type="submit" value="wijizg" id="wijzig" />
                


		<?php } ?>

</div>




<div id="menucontent"> 
</div>


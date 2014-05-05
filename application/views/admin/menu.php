<script type="text/javascript">
$(document).ready(function(){

 var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid' : "1"
        };
       $(".menucontent").load('/admin/menu/loadmenu/>',data);
});
</script>

<h1>Menu's</h1>
<div id="rightside">

	<section>

		<p>Hier komen de menu's voor de restauranthouder.</p>

		<button class="toevoegen"type="submit">menu toevoegen </button>

	</section>




<a href="#" class="voorgerechten">Voorgerechten</a>
<a href="#" class="hoofdgerechten">Hoofdgerechten</a>
<a href="#" class="nagerechten"	>Nagerechten</a>


<div class="menucontent">


<<<<<<< HEAD
=======
<?php foreach ($query as $row) { ?>
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

>>>>>>> 0486322e0fda785398d6478fa7855f3fcd389d86
</div>

<script type="text/javascript">
  

    $(".toevoegen").on('click',function(){
        var data = {
            'restaurantid': '<?php echo $restaurantid;?>'
        };
        openWindow('/admin/menu/form',data);
    });

     $(".voorgerechten").on('click',function(){
        
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid' : "1"
        };
       $(".menucontent").load('/admin/menu/loadmenu/>',data);
    });


     $(".hoofdgerechten").on('click',function(){
var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid' : "2"
        };
       $(".menucontent").load('/admin/menu/loadmenu/>',data);
    });

     $(".nagerechten").on('click',function(){
     var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid' : "3"
        };
       $(".menucontent").load('/admin/menu/loadmenu/>',data);
    });
</script>




<script type="text/javascript">
 $(document).ready(function(){
      var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid': "1"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
     
 });

</script>


  <section class="contain">

<h1>Menu's</h1>
<div id="rightside">

		<p>Hier komen de menu's voor de restauranthouder.</p>

		<button class="toevoegen"type="submit">menu toevoegen </button>





<a href="#" class="voorgerechten">Voorgerechten</a>
<a href="#" class="hoofdgerechten">Hoofdgerechten</a>
<a href="#" class="nagerechten"	>Nagerechten</a>


<div class="menucontent">


</div>

  </section>

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
            'gerechttypeid': "1"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
    });


     $(".hoofdgerechten").on('click',function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid': "2"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
    });


     $(".nagerechten").on('click',function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid': "3"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
    });

</script>

</div>


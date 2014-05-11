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

<a href="#" class="gerecht" id="voorgerechten">Voorgerechten</a>
<a href="#" class="gerecht" id="hoofdgerechten">Hoofdgerechten</a>
<a href="#" class="gerecht" id="nagerechten">Nagerechten</a>

		<input class="toevoegen"type="submit" value="toevoegen" />


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


     $("#voorgerechten").on('click',function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid': "1"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
    });


     $("#hoofdgerechten").on('click',function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid': "2"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
    });


     $("#nagerechten").on('click',function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'gerechttypeid': "3"
        };
       $(".menucontent").load('/admin/menu/loadmenu',data);
    });

</script>

</div>


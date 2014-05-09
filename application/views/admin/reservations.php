<script type="text/javascript">
 $(document).ready(function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'weergave' : 'tabel'
        };
       $(".reservatiecontent").load('/admin/reservations/loadres',data);
    });

</script>
<section class="contain">

<a href="#" class="tabelweergave">tabelweergave</a>
<a href="#" class="lijstweergave">lijstweergave</a>

<div class="reservatiecontent">


</div>



<script type="text/javascript">
	var curdate = '<?php echo date("d-m-Y");?>';
     $(".tabelweergave").on('click',function(){
      var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'weergave' : 'tabel'
        };
       $(".reservatiecontent").load('/admin/reservations/loadres',data);
    });
     $(".lijstweergave").on('click',function(){
       var data = {
            'restaurantid': '<?php echo $restaurantid;?>',
            'weergave': 'lijst',
            'date' : curdate
        };
       $(".reservatiecontent").load('/admin/reservations/loadres',data);
    });



</script>


</section>

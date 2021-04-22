<?php
include_once ("includes/body.inc.php");
top();
?>
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="w-cards__icon">
            <div class="w-cards__icon_wrapper">
                <h3>Perfil</h3>
            </div>
        </div>
        <br>
    </div>


</div> <!-- fim do container -->

<div class="services">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>

<!-- Footer Starts Here -->


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>

</body>
</html>
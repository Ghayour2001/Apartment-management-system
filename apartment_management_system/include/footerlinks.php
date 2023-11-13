    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script>


    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
   
    <!---for sweet alert --->
        <script src="js/sweetalert.js"></script>

        <?php if (
            isset($_SESSION['status']) &&
            $_SESSION['status_code'] != ''
        ) { ?>

<script>
swal({
    title: "<?php echo $_SESSION['status']; ?>",
    text: "You clicked the button!",
    icon: "<?php echo $_SESSION['status_code']; ?>",

});
</script>

<?php unset($_SESSION['status']);} ?>
        

       

     <!-- scripit init-->
     <script src="js/dashboard2.js"></script>
     <script src="js/cdn3.6.3.js"></script>
     <script src="js/validation_plugins.js"></script>
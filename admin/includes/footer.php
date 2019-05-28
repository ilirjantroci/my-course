 <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2019 - 2020 © Copyright My-Course.al 
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="../dark-hori/assets/js/jquery.min.js"></script>
        <script src="../dark-hori/assets/js/popper.min.js"></script><!-- Popper for Bootstrap --><!-- Tether for Bootstrap -->
        <script src="../dark-hori/assets/js/bootstrap.min.js"></script>
        <script src="../dark-hori/assets/js/waves.js"></script>
        <script src="../dark-hori/assets/js/jquery.slimscroll.js"></script>
        <script src="../dark-hori/assets/js/jquery.scrollTo.min.js"></script>

        <!-- Counter Up  -->
        <script src="../plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!-- circliful Chart -->
        <script src="../plugins/jquery-circliful/js/jquery.circliful.min.js"></script>
        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- skycons -->
        <script src="../plugins/skyicons/skycons.min.js" type="text/javascript"></script>

        <!-- Page js  -->
        <script src="../dark-hori/assets/pages/jquery.dashboard.js"></script>

        <!-- Custom main Js -->
        <script src="../dark-hori/assets/js/jquery.core.js"></script>
        <script src="../dark-hori/assets/js/jquery.app.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $('.circliful-chart').circliful();
            });

            // BEGIN SVG WEATHER ICON
            if (typeof Skycons !== 'undefined'){
                var icons = new Skycons(
                        {"color": "#3bafda"},
                        {"resizeClear": true}
                        ),
                        list  = [
                            "clear-day", "clear-night", "partly-cloudy-day",
                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                            "fog"
                        ],
                        i;

                for(i = list.length; i--; )
                    icons.set(list[i], list[i]);
                icons.play();
            };

        </script>

    </body>

<!-- Mirrored from coderthemes.com/minton/dark-hori/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 07:33:41 GMT -->
</html>
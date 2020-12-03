  <!-- footer area start-->
  <footer class="bg-transparent">
      <div class="footer-area">
          <p>© Copyright 2020. All right reserved. by <a href="https://colorlib.com/wp/">OtoExpert</a>.</p>
      </div>
  </footer>
  <!-- footer area end-->
  </div>



  <!-- jquery latest version -->

  <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
  <!-- bootstrap 4 js -->
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/owl.carousel.min.js"></script>
  <script src="./assets/js/metisMenu.min.js"></script>
  <script src="./assets/js/jquery.slimscroll.min.js"></script>
  <script src="./assets/js/jquery.slicknav.min.js"></script>

  <!-- start chart js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!-- start zingchart js -->
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <script>
      zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
      ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
  </script>
  <!-- start highcharts js -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <!-- start amcharts -->
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
  <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
  <!-- all line chart activation -->
  <script src="./assets/js/line-chart.js"></script>
  <!-- all pie chart -->
  <script src="./assets/js/pie-chart.js"></script>
  <!-- all bar chart -->
  <script src="./assets/js/bar-chart.js"></script>
  <!-- all map chart -->
  <script src="./assets/js/maps.js"></script>
  <!-- others plugins -->
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/scripts.js"></script>

  <script>
      $('#dataAdmin').on('show.bs.modal', event => {
          var button = $(event.relatedTarget);
          var modal = $(this);
          // Use above variables to manipulate the DOM

      });

      $(document).ready(function() {
          $('.editBtn').on('click', function() {
              $('#editModal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();
              }).get();

              console.log(data);

              $('#id').val(data[0]);
              $('#nama').val(data[1]);
              $('#username').val(data[2]);
              $('#password').val(data[3]);
              $('#foto').val(data[4]);
          });
      });
  </script>

  </body>

  </html>
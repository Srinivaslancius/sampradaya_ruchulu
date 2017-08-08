
        </div>             
        
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        <!-- model pop-up Script for all pages with bootstrap js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".click_view").click(function(){
                    var modalId = $(this).attr('data-modalId');
                    $("#myModal_"+modalId).modal('show');  
                });                  
            });
        </script>
        <!--code for image refresh-->
        <script>
          var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
          };
          $("form").submit(function(e) {

            var ref = $(this).find("[required]");

            $(ref).each(function(){
                if ( $(this).val() == '' )
                {
                    alert("Required field should not be blank.");

                    $(this).focus();

                    e.preventDefault();
                    return false;
                }
            });  return true;
        });
        </script>
    </body>
</html>
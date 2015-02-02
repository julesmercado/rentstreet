<!-- jQuery -->
  
   <script src="<?php echo base_url('assets/js/angular.min.js'); ?>" type=
    "text/javascript"></script>
    <script src="<?php echo base_url('assets/js/angular-sanitize.min.js'); ?>"></script> 
    <script src="<?php echo base_url('assets/js/angular-strap.js'); ?>"></script> 
    <script src="<?php echo base_url('assets/js/angular-strap.tpl.js'); ?>"></script>     
    <script src="<?php echo base_url('assets/js/app.js'); ?>" type="text/javascript"></script>  
    <script src="<?php echo base_url('assets/js/factory.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script> 
    <script src="http://code.jquery.com/jquery-latest.js"></script> <!-- Bootstrap Core JavaScript -->
     <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
     <script src="<?php echo base_url('assets/js/carousel.js'); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    
    <script>
        document.getElementById("sbr").addEventListener("click", function(){
            
              if(document.getElementById("sbr").innerHTML == "Send Borrow Request"){
                document.getElementById("sbr").innerHTML = "Cancel Request";
                document.getElementById("sbr").style.background = "red";
              } else {
                document.getElementById("sbr").innerHTML = "Send Borrow Request";
                document.getElementById("sbr").style.background = "#fa9900";
              }

        
        
    });
    </script>
    
</body>
</html>
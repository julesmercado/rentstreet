<!-- jQuery -->
     <script src="<?php echo base_url('assets/js/angular.min.js'); ?>" type=
    "text/javascript"></script>
    <script src="<?php echo base_url('assets/js/angular-sanitize.min.js'); ?>"></script> 
    <script src="<?php echo base_url('assets/js/angular-strap.js'); ?>"></script> 
    <script src="<?php echo base_url('assets/js/angular-strap.tpl.js'); ?>"></script>     
    <script src="<?php echo base_url('assets/js/app.js'); ?>" type="text/javascript"></script>  
    <script src="<?php echo base_url('assets/js/factory.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script> <!-- Bootstrap Core JavaScript -->
     <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
     <script src="<?php echo base_url('assets/js/contentHover.js'); ?>"></script>



     <script>
        document.getElementById("changeVal").addEventListener("click", function(){
            
                var x = document.getElementById("textVal").value;

                document.getElementById("spanResult").innerHTML = x;
               
             

        
        
    });
    </script>

    


     <script>
{{var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        };
        }}
    </script>
</body>
</html>
<!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script> 
    <script src="http://code.jquery.com/jquery-latest.js"></script> <!-- Bootstrap Core JavaScript -->
     <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 

     <script>
{{var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        };
        }}
    </script>

    <script>
        $(function(){
            var message = $('#nbrmsg');
            $('#msg').append(message);
            message.show('slow');
        });
    </script>

</body>
</html>
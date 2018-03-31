<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<style type="text/css">
    
    @import "compass/css3";

body{
  padding: 50px;
}

</style>
<script type="text/javascript">
    
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0	).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have been signed in successfully!
</div>
</body>
</html>
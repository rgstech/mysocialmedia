

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>teste contador</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    
function auto_load(){
        $.ajax({
          url: "contador.php",
          cache: false,
          success: function(data){
             $("#panelcontador").html(data);
          } 
        });
}

$(document).ready(function(){

auto_load(); //Call auto_load() function when DOM is Ready

});

//Refresh auto_load() function after 10000 milliseconds
setInterval(auto_load, 5000);

</script>
</head>

<body>


<div id="panelcontador"> </div>
<input>

</body>

</html>
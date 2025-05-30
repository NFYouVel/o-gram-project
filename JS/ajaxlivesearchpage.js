$(document).ready(function(){
        $("#searchin").keyup(function(){
            let input = $(this).val();
                $.ajax({
                url:"../layout/livesearchposts.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                  $("#searchHint").html(data).show();
                }
              });
        }); 
});
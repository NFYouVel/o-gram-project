$(document).ready(function(){
        $("#searchin").keyup(function(){
            let input = $(this).val();
            if (input !== "") {
                $.ajax({
                url:"../layout/livesearch.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                  $("#searchHint").html(data).show();
                }
              });
            } else{
              $("#searchHint").hide();
            }
        }); 
});

$(document).ready(function(){
  const id = $("#user-data").data("user-id");
        $("#searchin").keyup(function(){
            let input = $(this).val();
            if (input !== "") {
                $.ajax({
                url:"../layout/livesearch.php",
                method:"POST",
                data:{
                  input:input,
                  id:id
                },
                success:function(data){
                  $("#searchHint").html(data).show();
                }
              });
            } else{
              $("#searchHint").hide();
            }
        }); 
});
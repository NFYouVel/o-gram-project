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
              const defaultContent = `
            <div class="recommend-people">
                <h2 id="where-follow">Who to follow</h2>
                <div class="user-suggestion">
                    <img src="../layout/pict/Screenshot (10).png" alt="Profile 1" class="profile-img">
                    <div class="user-info">
                        <p class="display-name">David</p>
                        <p class="username">@DavidChristian</p>
                    </div>
                    <input type="checkbox" id="follow1" class="follow-toggle hidden">
                    <label for="follow1" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
                </div>

                <div class="user-suggestion">
                    <img src="../layout/pict/Screenshot (11).png" alt="Profile 2" class="profile-img">
                    <div class="user-info">
                        <p class="display-name">James</p>
                        <p class="username">@KohJiaQuan</p>
                    </div>
                    <input type="checkbox" id="follow2" class="follow-toggle hidden">
                    <label for="follow2" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
                </div>

                <div class="user-suggestion">
                    <img src="../layout/pict/Screenshot (14).png" alt="Profile 3" class="profile-img">
                    <div class="user-info">
                        <p class="display-name">Marvel</p>
                        <p class="username">@MarvelMoshing</p>
                    </div>
                    <input type="checkbox" id="follow3" class="follow-toggle hidden">
                    <label for="follow3" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
                </div>

                <div class="user-suggestion">
                    <img src="../layout/pict/Screenshot (14).png" alt="Profile 4" class="profile-img">
                    <div class="user-info">
                        <p class="display-name">Leon</p>
                        <p class="username">@LeonardPig</p>
                    </div>
                    <input type="checkbox" id="follow4" class="follow-toggle hidden">
                    <label for="follow4" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
                </div>

                <div class="user-suggestion">
                    <img src="../layout/pict/Screenshot (14).png" alt="Profile 5" class="profile-img">
                    <div class="user-info">
                        <p class="display-name">McQueen</p>
                        <p class="username">@LightningMcQueen</p>
                    </div>
                    <input type="checkbox" id="follow5" class="follow-toggle hidden">
                    <label for="follow5" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
                </div>
            </div>
            `;
            $("#searchHint").html(defaultContent).show(); 
            }
        }); 
});
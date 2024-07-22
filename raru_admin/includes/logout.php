<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                 <div class="pull-right">
                 	<a href="#" class="btn btn-success btn-lg" onclick="logout()" id="logoutid">Yes</a>
                    <input type="hidden" id="logoutData" name="logoutData" value="logoutData" />
                    <button class="btn btn-default btn-lg mb-control-close">No</button>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="item-delete">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-trash-o"></span> Delete</div>
            <div class="mb-content">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg" data-value="1">Yes</button>
                    <button class="btn btn-default btn-lg mb-control-close" data-value="0">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function logout()
{
	var logout1 = document.getElementById('logoutid').text;
	//alert(logout1);
	if(logout1 == 'Yes')
	{
		var logoutData = $("#logoutData").val();
		$.ajax
			({
			type: "POST",
			url: "ajax.php",
			data: "logoutData="+logoutData,

			success: function(msg)
			{
				window.location = "<?php echo $sitepath_admin; ?>"

			}
			});
	}
}
</script>
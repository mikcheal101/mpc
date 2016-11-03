<div class="container-fluid m-t-100 no-border">
	<div class="row ">
		<div class="col-md-10 col-md-offset-1">
			<div class="chat">
				<div class="chat-messages p-b-20 " style="height: 60vh; overflow-y: scroll;" id="chat-messages">

				</div>
				<div class="chat-input">
					<form id="chatForm" action="" method="post">
						<textarea class="form-control m-b-20 p-t-20" id="chatMsg" name="chatMsg" rows="1"></textarea>

						<div class="btn-group text-right pull-right">
							<span class="btn btn-sm btn-info" id="sendBtn" onclick="addMessage();">send</span>
							<span class="btn btn-sm btn-success" id="fbBtn" type="" onclick="authenticateFacebook();">Login / Sign Up</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

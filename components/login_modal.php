<div class="modal fade modalLogin" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">bookMart</h4>
      </div>
      <div class="modal-body center-block">
        
      <form method="POST" action="login.php">
        <div class="row center-block">
        	<input type="email" class="form-control" id="login_email" placeholder="Registered Email Address" style="margin-top: 5px;" required>
        </div>
        
        <div class="row center-block">
        <input type="password" class="form-control" id="login_password" placeholder="Your Password" style="margin-top: 7.0px" required>
      	</div>

      	<div class="row center-block">
      	<button type="button" class="btn btn-primary" style="margin-top: 10px; width:100%">Login to bookMart</button>
      	</div>
      </div>
      </form>

      <div class="modal-footer">
        <p class="help-block">Forgot Password?</p>
      </div>
    </div>
  </div>
</div>
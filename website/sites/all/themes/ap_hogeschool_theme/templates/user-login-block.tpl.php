<div id='user-login-block-container'>
  <div id='user-login-block-form-fields'>
    <?php print $name; // Display username field ?>
    <?php print $pass; // Display Password field ?>
    <?php print $submit; // Display submit button ?>
	<?php print $rendered; // Display hidden elements (required for successful login) ?>
 </div>
 
 <div class='edit-actions'>
	<div id="wachtwoord_vergeten">
		<a title="Wachtwoord vergeten?" href="user/password" id="wa_ve" >Wachtwoord vergeten?</a> 
	</div>
	<div id="registratie">
		<a title="Registratie" href="user/register" id="reg" >Registratie</a>
	</div>
  </div>
  
</div>

<div class="main-content">
	<div class="content">
		<legend>Registrieren</legend>
		
		<div class="row">
			<div class="col-md-4"><?php
				if(isset($_POST['submit']))
				{
					$Name = System::GetDB()->EscapeString($_POST['Name']);
					$Pass = System::GetDB()->EscapeString($_POST['Pass']);
					$Email = System::GetDB()->EscapeString($_POST['Email']);
					
					if($Pass !=$_POST['Pass2'])
					{
						echo "<div class='alert alert-danger' role='alert'><center>Die Passwörter stimmen nicht überein</center></div>";
						goto Register;
					}
					else
					{
						$Query = System::GetDB()->SendQuery("SELECT * FROM accounts WHERE Name='$Name'");
						if(System::GetDB()->NumRows($Query)==1)
						{
							echo "<div class='alert alert-danger' role='alert'><center>Der Benutzer existiert bereits</center></div>";
							goto Register;
						}
						else
						{
							$Query = System::GetDB()->SendQuery("SELECT * FROM accounts WHERE Email='$Email'");
							if(System::GetDB()->NumRows($Query)==1)
							{
								echo "<div class='alert alert-danger' role='alert'><center>Die Email Adresse ist bereits vergeben</center></div>";
								goto Register;
							}
							else
							{
								System::User()->Create($Name,$Pass,$Email);
								echo "<div class='alert alert-success' role='alert'><center>Registrierung erfolgreich, Sie können sich nun einloggen.</center></div>";
								goto Register;
							}
						}
					}
				}
				else
				{Register:
				?>
					<form action="?page=Register" method="post">
						<label>Benutzername</label>
						<div class="input-control text" data-role="input-control">
							<input type="text" name="Name" id="Name" placeholder="Name" required>
							<button class="btn-clear" tabindex="-1"></button>
						</div>
						
						<label>Passwort</label>
						<div class="input-control password" data-role="input-control">
							<input type="password" name="Pass" id="Pass" placeholder="Passwort" required>
							<button class="btn-reveal" tabindex="-1"></button>
						</div>
						
						<label>Passwort bestätigen</label>
						<div class="input-control password" data-role="input-control">
							<input type="password" name="Pass2" id="Pass2" placeholder="Passwort wiederholen" required>
							<button class="btn-reveal" tabindex="-1"></button>
						</div>
						
						<label>Email</label>
						<div class="input-control text" data-role="input-control">
							<input type="email" name="Email" id="Email" placeholder="Email Adresse" required>
							<button class="btn-clear" tabindex="-1"></button>
						</div>
						
						
						<input type="submit" name="submit" value="Registrieren" />
					</form><?php 
				}?>
			</div>
			<div class="col-md-4">
				<label>Sie haben schon einen Account?</label>
				Dann Loggen sie sich jetzt ein.
				<a href="?page=Login">Klicken sie hier.</a>
			</div>
		</div>
	</div>
</div>

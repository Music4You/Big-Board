<?php 	
System::LoadPostFile("Acp","BoardSettingsPost");
?>
<div class="main-content">
	<div class="content">
		<div class="tab-control" data-role="tab-control">
			<ul class="tabs">
				<?php echo((PageLogic::GetParam("type")=="generally") ? "<li class='active'>" : "<li>");?><a href="#generally">Allgemein</a></li>
				<?php echo((PageLogic::GetParam("type")=="mysql") ? "<li class='active'>" : "<li>");?><a href="#mysql">MySQL</a></li>
				<?php echo((PageLogic::GetParam("type")=="impressum") ? "<li class='active'>" : "<li>");?><a href="#impressum">Impressum</a></li>
			</ul>
		 
			<div class="frames">
				<div class="frame" id="generally">
					<form method="post" action="?page=Acp&show=BoardSettings&type=generally">
						<label for="BoardName">Board Name</label>
						<div class="input-control text" >
							<input type="text" name="BoardName" id="BoardName" placeholder="<?php echo Settings::GetSystemData("settings","BoardName");?>">
						</div>
					
						<input type="submit" name="BoardSettingsSubmit" class="primary" value="Speichern"/>
					</form>
				</div>
				
				<div class="frame" id="mysql">
					<form method="post" action="?page=Acp&show=BoardSettings&type=mysql">
						<label for="MySQLHost">Hostname | IP</label>
						<div class="input-control text" >
							<input type="text" name="MySQLHost" id="MySQLHost" placeholder="<?php echo Settings::GetSystemDataFromFile("sql-config.ini","host");?>">
						</div>
						
						<label for="MySQLUser">Username</label>
						<div class="input-control text" >
							<input type="text" name="MySQLUser" id="MySQLUser" placeholder="<?php echo Settings::GetSystemDataFromFile("sql-config.ini","user");?>">
						</div>
						
						<label for="MySQLPass">Passwort, <sub>Muss existieren!</sub></label>
						<div class="input-control text" >
							<input type="password" name="MySQLPass" id="MySQLPass" placeholder="<?php echo Settings::GetSystemDataFromFile("sql-config.ini","pass");?>">
						</div>
						
						<label for="MySQLData">Datenbank</label>
						<div class="input-control text" >
							<input type="text" name="MySQLData" id="MySQLData" placeholder="<?php echo Settings::GetSystemDataFromFile("sql-config.ini","data");?>">
						</div>
						
						<input type="submit" name="BoardSettingsMySQL" class="primary" value="Speichern"/>
					</form>
				</div>
				
				<div class="frame" id="impressum">
					<form method="post" action="?page=Acp&show=BoardSettings&type=impressum">
						<label for="ImpName">Vorname | Familienname</label>
						<div class="input-control text" >
							<input type="text" name="ImpName" id="ImpName" placeholder="<?php echo Settings::GetSystemData("impressum","Name");?>">
						</div>
						
						<label for="ImpAnschrift">Anschrift</label>
						<div class="input-control text" >
							<input type="text" name="ImpAnschrift" id="ImpAnschrift" placeholder="<?php echo Settings::GetSystemData("impressum","Anschrift");?>">
						</div>
						
						<label for="ImpOrt">Postleitzahl | Ort</label>
						<div class="input-control text" >
							<input type="text" name="ImpOrt" id="ImpOrt" placeholder="<?php echo Settings::GetSystemData("impressum","Ort");?>">
						</div>
						
						<label for="ImpEmail">Email</label>
						<div class="input-control text" >
							<input type="email" name="ImpEmail" id="ImpEmail" placeholder="<?php echo Settings::GetSystemData("impressum","Email");?>">
						</div>
						
						<label for="ImpTelefon">Telefon</label>
						<div class="input-control text" >
							<input type="text" name="ImpTelefon" id="ImpTelefon" placeholder="<?php echo Settings::GetSystemData("impressum","Telefon");?>">
						</div>
						
						<input type="submit" name="BoardSettingsImpressum" class="primary" value="Speichern"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('.tab-control').tabcontrol({
    effect: 'fade'
});
</script>
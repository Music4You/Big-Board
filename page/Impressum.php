<div class="main-content">
	<div class="content">
		<legend>Impressum</legend>
		
		<b>Name:</b> <?php echo Settings::GetSystemData("impressum","Name");?><br/>
		<b>Anschrift:</b> <?php echo Settings::GetSystemData("impressum","Anschrift");?><br/>
		<b>PLZ / Ort:</b> <?php echo Settings::GetSystemData("impressum","Ort");?><br/>
		<b>Telefon:</b> <?php echo Settings::GetSystemData("impressum","Telefon");?><br/>
		<b>Email:</b> <a href="mailto:<?php echo Settings::GetSystemData("impressum","Email");?>"><?php echo Settings::GetSystemData("impressum","Email");?></a><br/>
		
		<hr/>
		<small>Angaben gemaß §5 Telemediengesetz</small>
	</div>
</div>
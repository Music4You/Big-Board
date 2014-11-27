<div class="main-content">
	<div class="content"><?php
		if(System::User()->IsLogged()==0)
		{
			echo "<div class='alert alert-danger'><b>Error:</b> Sie sind nicht eingeloggt!</div>";
		}
		else
		{
		?>
			<legend>Dein Profil, <?php echo System::User()->Name();?></legend>
			<button class="info pull-right" onclick="window.location.href='?page=Profile&action=Edit'">Bearbeiten</button>
			<div class="row profil">
				<div class="col-md-2">
					<a href="?page=Profile"><img src="https://avatars0.githubusercontent.com/u/8975502?v=2&s=460"/></a>
				</div>
				<div class="col-md-2">
					<?php echo System::User()->Name();?><br/>
					<span class="label label-primary small">Administrator</span><br/>
				</div>
			</div>
			<div class="row profil">
				<div class="col-md-4">
					<h3>Persöhnliches</h3>
					Geschlecht: Männlich<br/>
					Geburtstag: 07.05.1998<br/>
					Wohnort: Neugersdorf<br/>
				</div>
			</div><?php
		}?>
	</div>
</div>
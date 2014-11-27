<nav class="navigation-bar dark">
	<div class="main-content">
		<nav class="navigation-bar-content">
			<span class="element-divider"></span>
			<a href="?page=Index" class="element"><span class="icon-grid-view"></span> <?php echo Boardname;?> <sup>ACP</sup></a>
			<span class="element-divider"></span>
			<a href="?page=Acp&show=Index" class="element"><span class="icon-grid-view"></span> Startseite</a>
			<a href="?page=Acp&show=BoardSettings&type=generally" class="element"><span class="icon-grid-view"></span> Allgemein</a>
			
			
			<div class="element">
				<a class="dropdown-toggle" href="#">Benutzer</a>
				<ul class="dropdown-menu dark" data-role="dropdown">
					<li><a href="?page=Acp&show=User">Benutzerverwaltung</a></li>
					<li class="divider"></li>
					<li><a href="?page=Acp&show=UserGroup">Benutzergruppen</a></li>
				</ul>
			</div>
			
			<div class="element place-right">
				<a class="dropdown-toggle" href="#"><?php echo $_SESSION['username'];?></a>
				<ul class="dropdown-menu dark" data-role="dropdown"></li>
					<li><a href="?page=Index">Forum</a></li>
					<li class="divider"></li>
					<li><a href="?page=Logout">Ausloggen</a></li>
				</ul>
			</div>
		</nav>
	</div>	
</nav>
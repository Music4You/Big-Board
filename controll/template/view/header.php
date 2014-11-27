<nav class="navigation-bar dark">
	<div class="main-content">
		<nav class="navbar-content">
			<span class="element-divider"></span>
			<a href="?page=Index" class="element"><span class="icon-grid-view"></span> <?php echo Boardname;?> <sup>V1.0.1</sup></a>
			<span class="element-divider"></span>
			<a class="element brand" href="?page=Index">Forum</a>
			<a class="element brand" href="?page=User">Mitglieder</a>
			<a class="element brand" href="?page=Changelog">Changelog</a>
			<a class="element brand" href="?page=Development">Entwicklung</a>
				
			<div class="element place-right"><?php
				if(System::User()->IsLogged()==0)
				{?>
					<a class="dropdown-toggle" href="#">Login</a>
					<ul class="dropdown-menu dark" data-show="hover" data-role="dropdown">
						<li><a href="?page=Login">Login</a></li>
						<li class="divider"></li>
						<li><a href="?page=Register">Registrieren</a></li>
					</ul><?php
				}
				else
				{?>
					<a class="dropdown-toggle" href="#"><?php echo System::User()->Name();?></a>
					<ul class="dropdown-menu dark" data-role="dropdown"></li>
						<li><a href="?page=Profile">Profil</a></li>
						<li><a href="?page=EditProfile">Profil bearbeiten</a></li>
						<li><a href="?page=PrivateNews">Private Nachrichten </a></li>
						<?php if(System::User()->Adminlevel) { ?>
						<li class="divider"></li>
						<li><a href="?page=Acp&show=Index">Administration</a></li><?php }?>
						<li class="divider"></li>
						<li><a href="?page=Logout">Ausloggen</a></li>
					</ul><?php
				}?>
			</div>
				
			<div class="element input-element place-right">
				<form action="?page=Search" method="post">
					<div class="input-control text">
						<input type="text" name="search" placeholder="Suche">
						<button class="btn-search"></button>
					</div>
				</form>
			</div>
		</nav>
	</div>	
</nav>	
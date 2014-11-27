<div class="main-content">
	<div class="content">
		<legend>Benutzerliste</legend>
		<table class="table hovered">
            <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Letzter Login</th>
                    <th class="text-left">Registrierungs Datum</th>
					<th class="text-left">Email</th>
					<th class="text-left">Geburtstag</th>
				</tr>
			</thead>

			<tbody><?php
				$userdata = System::User()->GetUsersData();
				$count = count($userdata);
				for($i=0;$i<$count;$i++)
				{
					echo "<tr>";
					echo "<td><a href='?page=User&Show=".$userdata[$i]['id']."'>".$userdata[$i]['Name']."</a></td>";
					echo "<td>".$userdata[$i]['LastLogin']."</td>";
					echo "<td>".$userdata[$i]['RegisterDate']."</td>";
					echo "<td>".$userdata[$i]['Email']."</td>";
					echo "<td>".$userdata[$i]['Geburtstag']."</td>";
					echo "</tr>";
				}?>
			</tbody>
		</table>
	</div>
</div>
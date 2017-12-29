<div class="container profil-uzytkownika">
	<p>Profil:</p>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Login</td>
				<td><?php echo $_SESSION['user'] ?></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Hasło</td>
				<td><a href="index.php?page=zmien-haslo"><button type="button" class="btn btn-primary btn-xs">zmień hasło</button></a></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $_SESSION['email'] ?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="index.php?page=usun-konto"><button type="button" class="btn btn-danger btn-xs">usuń konto</button></a></td>
			</tr>
		</tbody>
	</table>
</div>

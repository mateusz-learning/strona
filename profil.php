<div class="container profil_uzytkownika">
	<p>Profil:</p>
	<table class="table table-hover">
		<tbody>
			<tr>
				<td>Login</td>
				<td><?php echo $_SESSION['user'] ?></td>
			</tr>
			<tr>
				<td>Hasło</td>
				<td><button type="button" class="btn btn-primary btn-xs">zmień hasło</button></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $_SESSION['email'] ?></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="button" class="btn btn-danger btn-xs">usuń konto</button></td>
			</tr>
		</tbody>
	</table>
</div>

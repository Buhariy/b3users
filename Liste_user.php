<?php
include "connect.php";
$link=connect();
$sql = "SELECT * FROM user";
$stmt = $link->prepare($sql);
$stmt->execute();
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<style type="text/css">
	th,td {
  		text-align: left;
 		 padding: 8px;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	h1{
	margin-top:30px;
	margin-left:50px;	
	}
</style>
	<h1>Liste des utilisateurs :</h1>
	<center><table class="toto">
		<tr>
			<th>
			Id
			</th>
			<th>
			Nom
			</th>
			<th>
			Prenom
			</th>
			<th>
			Num
			</th>
		</tr>
		<?php foreach($stmt as $user){ ?>
		<tr>
		<td>
			<?php echo $user['id']."<br>"; ?> 
		</td>
		<td>
			<?php echo $user['nom']."<br>"; ?> 
		</td>
		<td>
			<?php echo $user['prenom']."<br>"; ?>
		</td>
		<td>
			<?php echo $user['num']."<br>"; ?>
		</td>
		</tr>
		<?php } ?>
	</table>
	</center>
	<br/>
	<center>
	<table>
		<form method="post" action="" >
		<tr>
			<td>
				<input type="submit" name="sendDL" class="btn btn-primary" value="Supprimer"/>
			</td>
			<td>
				<input type="text" name="DLsuppr" />
			</td>
		</tr>
		</form>
	</table>
	<br/>
	</center>
	<form method="post" action="" >
	<center>
		<table>
		<th>
		MaJ
		</th>
		<th>
		<input type="submit" name="sendUP" value="Update" class="btn btn-primary" id="sendUPDATE"/>
		</th>	
		<tr><!--La maj d'un fichier-->
			<td>
				Nom :
			</td>
			<td>
				<input type="text" name="majareaN" />
			</td>
		</tr>
		<tr>
			<td>
				Prenom :
			</td>
			<td>
				<input type="text" name="majareaP" />
			</td>
		</tr>
		<tr>
			<td>
				Num :
			</td>
			<td>
				<input type="text" name="majareaNum" />
			</td>
		</tr>
		<tr>
			<td>
				sélectionner Id a modifier :
			</td>
			<td>
				<input type="text" name="select" />
			</td>
		</tr>
	</table>
	</center>
	</form>
	<center><a href="http://localhost/exophp/users/formulaire.php"><input type="button" name="sendUP" value="Inscription" class="btn btn-primary" id="sendUPDATE"/></a></center>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
<?php
if(!empty($_POST['DLsuppr'])){
$link=connect();
$sql = "DELETE FROM `user` WHERE `id`=:id";
$stmt = $link->prepare($sql);
$stmt->execute(array(
	"id" => $_POST['DLsuppr'],
));
header('Location: http://localhost/exophp/users/Liste_user.php');
}
if(!empty($_POST['sendUP'])){
$link=connect();
$stmt = $link->prepare("UPDATE user SET nom = ?, prenom = ?, num = ? WHERE `id` = ? ");
$stmt->execute(array($_POST['majareaN'],$_POST['majareaP'],$_POST['majareaNum'],$_POST['select']));
header('Location: http://localhost/exophp/users/Liste_user.php');
}
?>
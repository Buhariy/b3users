<?php
function connect(){
	try {
		return $link = new PDO('mysql:host=localhost:3307;dbname=user',
		'root', '');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br>";
		die();
	}
}
$link=connect();

$sql = "SELECT * FROM user";

$stmt = $link->prepare($sql);
$stmt->execute();

/*$result = $stmt->fetchAll();
print_r($result);*/

?>

<html>
	<body>
			<h1>Liste user :</h1>
	<table border="1" class="toto"><style type="text/css">.toto {border-color:blue;}</style>
	<tr>
		<th>
		nom
		</th>
		<th>
		prenom
		</th>
		<th>
		num
		</th>
		<!--<th>
		supprimer
		</th>
		<th>
		modifier
		</th>-->
	</tr>
	<?php foreach($stmt as $user){ ?>
	<tr>
		<td>
			<?php echo $user['nom']."<br>"; ?> 
		</td>
		<td>
			<?php echo $user['prenom']."<br>"; ?>
		</td>
		<td>
			<?php echo $user['num']."<br>"; ?>
		</td>
		<!--<td>
		<input type="submit" name="sendDL" value="Supprimer"/>
		</td>
		<td>
		<input type="submit" name="sendUP" value="Update"/>
		</td>-->
	</tr>
	<?php } ?>
	</table>
	<table>
		<form method="post" action="" >
		<tr>
			<td>
				<input type="submit" name="sendDL" value="Supprimer"/>
			</td>
			<td>
				<input type="text" name="DLsuppr" />
			</td>
		</tr>
		</form>
	</table>
	<form method="post" action="" >
	<table border="1">
	<th>
	MaJ
	</th>
	<th>
	<input type="submit" name="sendUP" value="Update"/>
	</th>	
	<tr>
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
			sélectionner nom a modifier :
		</td>
		<td>
			<input type="text" name="select" />
		</td>
	</tr>
	</table>
	</form>
	</body>
</html>
<?php

if(!empty($_POST['DLsuppr'])){
$link=connect();

$sql = "DELETE FROM `user` WHERE `prenom`=:prenom";

$stmt = $link->prepare($sql);
$stmt->execute(array(
	"prenom" => $_POST['DLsuppr'],
));
header('Location: http://localhost/exophp/Liste_user.php');
}

if(!empty($_POST['majarea'])){
$link=connect();
/*
$sql = "UPDATE `user` SET
 `nom`="$_POST['majareaN']",
 `prenom`="$_POST['majareaP']"',
 `num`="$_POST['majareaNum']"
 WHERE
 `nom`="$_POST['select']";";
*/
$stmt = $link->prepare($sql);
$stmt->execute(array(
	"prenom" => $_POST['DLsuppr'],
));
header('Location: http://localhost/exophp/Liste_user.php');
}


//
?>
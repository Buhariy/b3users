<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	<body>
	<style type="text/css">
	td {
  		text-align: left;
 		 padding: 8px;
	}
	.send{
		background-color: #008CBA;
  		border: 1;
		border-radius:10px;
  		color: white;
		padding: 10px 20px;
  		text-align: center;
  		text-decoration: none;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	h1{
	margin-top:30px;
	margin-left:50px;	
	}
	</style>

	<div>
		<h1>Formulaire :</h1>
		<form method="post" action="" >
		<center><table class="toto">
		<tr>
			<tr><td>Nom:</td><td><input type="text" name="nom" /></td></tr>
			<tr><td>Prenom:</td><td><input type="text" name="prenom" /></td></tr>
			<tr><td>Numero:</td><td><input type="text" name="num" /></td></tr>
		</tr
		><td><input type="submit" name="send" value="Ok" class="send" /></center></td>
		</table>
		</form>
	</div>	
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


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
function check($post){
	if(isset($post['send'])){
		if(!empty($post['nom']) &&!empty($post['prenom'])&&!empty($post['num'])){

		return true;
		}
	}
	return false;
}

if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['num'])){
$link=connect();

$sql = "INSERT INTO `user`(`nom`, `prenom`, `num`) VALUES (:nom,:prenom,:num)";

$stmt = $link->prepare($sql);
$stmt->execute(array(
	"nom" => $_POST['nom'],
	"prenom" => $_POST['prenom'],
	"num" => $_POST['num'],
));
header('Location: http://localhost/exophp/users/Liste_user.php');
}
?>

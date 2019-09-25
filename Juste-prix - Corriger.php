<html>
	<body>
		<form method="post" action="" >
			<p>Devinez la valeur génenerer aléatoirement:</p>
			<input type="text" name="nb" class="ab" id="ab"/>
			
			<input type="submit" name="send" value="OK"/>
		</form>
	</body>
</html>
<?php 

session_start();
if (!isset($_SESSION['nb'])){
	$_SESSION['nb']=mt_rand(0, 100);
}
echo $_SESSION['nb'];
if (isset($_POST['send'])){
	if ($_SESSION['nb'] > $_POST['nb']){
		echo "trop petit";
	}elseif($_SESSION['nb']< $_POST['nb']){
		echo "trop grand";
	}elseif($_SESSION['nb'] == $_POST['nb']){
		echo "bravo";
		$_SESSION['nb'] = rand(1,100);
	}
}
?>




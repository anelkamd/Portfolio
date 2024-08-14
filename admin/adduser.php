<?php require_once('./menu.php'); ?>
<?php
///STATS:
//1. Total Item
$sql = $pdo->prepare("SELECT * FROM user");
$sql->execute();
$total_user = $sql->rowCount();

//2. Somme
/* $sql = $pdo->prepare("SELECT SUM(pu) AS montant FROM produit WHERE id=?");
$sql->execute(array($id_produit));
$arr = $sql->fetch();if($arr['montant'] == ''){$montant=0;}else $montant=$arr['montant']; */
?>

<?php
if(isset($_POST['adduser'])) {
     $error='';    
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error= 'Entrez Email & Password svp';
    } else {
		
		$photo = $_FILES['photo']['name'];
		$photo_tmp = $_FILES['photo']['tmp_name'];
		if($photo!='') {
			$ext = pathinfo( $photo, PATHINFO_EXTENSION );
			$file_name = basename( $photo, '.' . $ext );
			if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' && $ext!='JPG' ) {
				$error = 'Uploadez le fichier jpg, png, gif uniquement';
			}else{
			$photo_name = 'avatar-'.rand().'.'.$ext;
            move_uploaded_file( $photo_tmp, '../img/'.$photo_name );	
			}
		}else{
			$photo_name = 'avatar.png';
		}
		
		$email 		= strip_tags($_POST['email']);
		$password 	= strip_tags($_POST['password']);

    	$sql = $pdo->prepare("INSERT INTO user (email, pwd, photo) VALUES (?, ?, ?)");
    	$sql->execute(array($email, md5($password), $photo_name));
    	header("location: adduser.php");
		//echo'<script type="text/javascript"> window.location.rel="noopener" href = \'index.php\';</script>';
	    }
    }
?>
<div class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 dark:bg-gray-800"><div class="text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto"><div class="w-[30px] flex flex-col relative items-end">
<div class="relative flex">
</div></div><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]">

<h3>Ajout Utilisateurs (Tot: <?php echo $total_user;?>)</h3> 
<form method="post" action="search.php">
<table style="width:100%;"><tr>
<td><input type="text" id="q" name="q" placeholder="Rechercher un user ici..." class="form-control" style="width:100%;"></td>
<td><input type="submit" value="Rechercher" class="btn btn-warning" style="width:100%;"></td>
</tr></table>
</form>
<hr/>
<form method="post" style="display: block;" 
enctype="multipart/form-data">
<table border="0" style="width:100%;font-size:14px;" id="add_defensedepot_form" name="add_defensedepot_form">
<tbody>
<tr><td>E-mail</td><td>:</td><td><input type="email" name="email" id="email" class="form-control" required="on" placeholder="Entrer votre email" style="width:100%;"></td></tr>

<tr><td>Password</td><td>:</td><td><input type="password" name="password" id="password" class="form-control" required="on" placeholder="Entrer votre mot de passe" style="width:100%;"></td></tr>

<tr><td>Avatar</td><td>:</td><td><input type="file" name="photo" id="photo" class="form-control" style="width:100%;"></td></tr>
<tr><td colspan="4"><input type="submit" id="adduser" name="adduser" value="Ajouter" class="btn btn-primary"></td></tr>

</tbody></table>
</form>


<table id="tbl_esuivi_mvt" class="table table-bordered table-striped dataTable no-footer" border="1" style="width: 100%; font-size: 13px; border-style: solid; border-color: red; border-collapse: collapse;" role="grid" aria-describedby="tbl_esuivi_mvt_info">
					<thead>
						<tr>
						<th>Action</th>
						<th>Avatar</th>
						<th>E-mail</th>
						<th>Password</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$x=0;
					$sql = $pdo->prepare("SELECT * FROM user");
					$sql->execute();
					$total = $sql->rowCount();
					if($total>0){
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $data) {
					$x++;
						echo'<tr>
						<td><a href="edit.php?id='.$data['id'].'">
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button></a> 
				<a href="delete.php?id='.$data['id'].'"  onclick="return confirm(\'Are you sure you want to delete this item\')"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button></a>
                       </td>
						<td><img src="./../img/'.$data['photo'].'" style="width:40px;height:40px;border-radius: 10px 5%;"></td>
						<td>'.$data['email'].'</td>
						<td>'.$data['pwd'].'</td>
						</tr>';
					}
					}else{
					echo'<tr><td colspan="4" style="color:red;">Aucun element!</td></tr>';	
					}
					?>
					</tbody></table>

</div></div></div>
<?php require_once('./footer.php'); ?>
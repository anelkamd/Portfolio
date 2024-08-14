<?php require_once('./menu.php'); ?>
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
	$sql = $pdo->prepare("SELECT * FROM user WHERE id=?");
	$sql->execute(array($id));
	$total = $sql->rowCount();
	if($total>0){
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $data) {	
	$id		=	$data['id'];
	$email	=	$data['email'];
	$pwd	=	$data['pwd'];
	$avatar	=	$data['photo'];
	}
	}else{
	header("Location: logout.php");		
	}
	}else{
	header("Location: logout.php");	
	}

?>
<?php
if(isset($_POST['edituser'])) {
     $error='';    
    if(empty($_POST['email']) || empty($_POST['id'])) {
        $error= 'Entrez Email & Password svp';
    } else {
		
		$email 			= strip_tags($_POST['email']);
		$id 			= strip_tags($_POST['id']);
		$old_avatar 	= strip_tags($_POST['old_avatar']);
	
		$photo = $_FILES['photo']['name'];
		$photo_tmp = $_FILES['photo']['tmp_name'];
		if($photo!='') {
			$ext = pathinfo( $photo, PATHINFO_EXTENSION );
			$file_name = basename( $photo, '.' . $ext );
			if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' && $ext!='JPG' ) {
				$error = 'Uploadez le fichier jpg, png, gif uniquement';
			}else{			
			//Supprimer ancien avatar s'il est different de avatar.png
			if($old_avatar!='avatar.png'){
			unlink('../img/'.$old_avatar);	
			}
				
			$photo_name = 'avatar-'.rand().'.'.$ext;
            move_uploaded_file( $photo_tmp, '../img/'.$photo_name );	
			}
		}else{
			$photo_name = $old_avatar;
		}
	
    	$sql = $pdo->prepare("UPDATE user SET email=?, photo=? 
		WHERE id=?");
    	$sql->execute(array($email, $photo_name, $id));
		
		
    	header("location: index.php?cible=edit&id=".$id."&msg='success'");
	    }
    }
?>
<div class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 dark:bg-gray-800"><div class="text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto"><div class="w-[30px] flex flex-col relative items-end">
<div class="relative flex">
</div></div><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]">

<h3>Edition Utilisateur</h3>

<?php if(isset($_GET['msg']) AND !empty($_GET['msg'])){
echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Felicitation!</h4>
<p class="mb-0">Edition effectuee avec succes</p>
</div>';
}
?>
<form method="post" style="display: block;" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
<input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar;?>">
<table border="0" style="width:100%;font-size:14px;" id="add_defensedepot_form" name="add_defensedepot_form">
<tbody>
<tr><td>E-mail</td><td>:</td><td><input type="email" name="email" 
id="email" class="form-control" required="on" 
placeholder="Entrer votre email" style="width:100%;" 
value="<?php echo $email;?>"></td></tr>

<tr><td>Password</td><td>:</td><td><input type="password" name="password" id="password" class="form-control" required="on" placeholder="Entrer votre mot de passe" style="width:100%;" value="<?php echo $pwd;?>" disabled></td></tr>

<tr><td>Old Avatar</td><td>:</td><td><img src="./../img/<?php echo $avatar;?>" style="width:50px;height:50px;"></td></tr>

<tr><td>New Avatar</td><td>:</td><td><input type="file" name="photo" id="photo" class="form-control" style="width:100%;"></td></tr>

<tr><td colspan="4"><input type="submit" id="edituser" name="edituser" value="Editer" class="btn btn-primary"></td></tr>

</tbody></table>
</form>

</div></div></div>
<?php require_once('./footer.php'); ?>
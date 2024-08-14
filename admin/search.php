<?php require_once('./menu.php'); ?>

<?php
if(isset($_POST['q'])){
	$q=$_POST['q'];
}else{
	header("Location: logout.php");	
	}

?>

<div class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 dark:bg-gray-800"><div class="text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto"><div class="w-[30px] flex flex-col relative items-end">
<div class="relative flex">
</div></div><div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]">

<h3>Résultats recherche <u><?php echo $q;?></u></h3>

<table id="tbl_esuivi_mvt" class="table table-bordered table-striped dataTable no-footer" border="1" style="width: 100%; font-size: 13px; border-style: solid; border-color: red; border-collapse: collapse;" role="grid" aria-describedby="tbl_esuivi_mvt_info">
					<thead>
						<tr>
						<th>Action</th>
						<th>N°</th>
						<th>E-mail</th>
						<th>Password</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$x=0;
					$sql = $pdo->prepare("SELECT * FROM user WHERE email LIKE '%".$q."%'");
					$sql->execute();
					$total = $sql->rowCount();
					if($total>0){
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $data) {
					$x++;
						echo'<tr>
						<td><a href="index.php?cible=edit&id='.$data['id'].'">
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button></a> 
				<a href="index.php?cible=delete&id='.$data['id'].'"  onclick="return confirm(\'Are you sure you want to delete this item\')"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button></a>
                       </td>
						<td>'.$x.'</td>
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
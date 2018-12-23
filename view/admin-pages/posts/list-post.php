<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if is a authenticate user
if(verifyAuthUser()){
	// Requesting the header file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Postagens</h2>
	<?php
	// Bring all projects
	// Instancing the class PDO
	$p = new PostsDAO();
	$results = $p->listPost();

	// print_r($results);
	// Getting the information the post has been deleted,updated,created.
	$message = filter_input(INPUT_GET,'info');
	if($message == 'cp'){
		echo "<script>alert('Post criado!');</script>";
	}else if($message == 'up'){
		echo "<script>alert('Post atualizado!');</script>";
	}else if($message == 'dp'){
		echo "<script>alert('Post deletado!');</script>";
	}
	?>

	<a class="btn waves-effect waves-light" href="/create/post">Criar post</a>
	<table class="table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Título</th>
				<th>Conteúdo</th>
				<th>Categoria</th>
				<th style="text-align: center;">Imagem</th>
				<th style="text-align: center;">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($results as $result):?>
				<tr>

					<td><?php echo $result['post_id'] ?></td>
					<td><?php echo $result['post_name'] ?></td>
					<td><?php echo $result['post_content'] ?></td>
					
					<td style="text-align: center;"><?php echo getTabela('fb_category',$result['post_category'],category_id, category_name) ?></td>
					
					<td style="text-align: center;"><?php echo "<img width='50' height='50' src=".$result['post_thumbnail'].">" ?></td>					
					
					<td style="text-align: right; width: 250px"> 
						<a href="/update/post?id=<?php echo $result['post_id']; ?>&imagem=<?php echo $result['post_thumbnail']; ?>" class="btn waves-effect waves-light">
							Atualizar
						</a>
						
						<a href="../../../controller/postController.php?operation=delete&postID=<?php echo $result['post_id']; ?>" class="btn waves-effect waves-light red">
							Deletar
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php
// Requesting the footer file
require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}

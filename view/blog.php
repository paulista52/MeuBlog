<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('templates'.DIRECTORY_SEPARATOR.'header.php');
// Searching the posts
$p = new PostsDAO();
$posts = $p->listPostHome();

?>
<br>
<br>
<div class="container-fluid">
	<div class="row text-center">
		
		<div class="col s8">
		<?php foreach($posts as $ln){ ?>
			
			<div id="postHome">				
				<h2><?=$ln->post_name;?></h2>
				<img class="boxall img-fluid" src="<?php siteURL()?>/<?=$ln->post_thumbnail;?>" alt="<?=$ln->post_name;?>">	
				
				
				<div class="contents">
					<em class="text-justify"><?=$ln->post_content;?></em>
				</div>

				<div class="social">
					
					<ul>
					
					<li class="left"> 
						<a href="#" class="badge badge-pill badge-info">
							<i class="fa fa-share-alt"></i>
							Compartilhar							
					    </a>
					</li>

					<li class="left">
						<a href="#" class="badge badge-pill badge-info">
							<i class="fa fa-thumbs-o-up"></i>
							Gostei 992 
						</a>
					</li>
					
					<li class="right"> 
						<?php
							$nome = getTabela('fb_user',$ln->post_user,user_id,user_name);
							$autor = explode(" ", $nome);
						?>
						<a href="#" class="badge badge-pill badge-info">
							<?=$autor[0]?>
							<i class="fa fa-user-o"></i>							
					    </a>
					</li>				

					</ul>
				</div>

			</div>		
		<?php }	?>		
		</div>
		
		<div class="col s4">

			<?php require_once('sidebar.php');?>
			
		</div>
	</div>
</div>
<?php 
// Requesting the footer file
require_once('templates'.DIRECTORY_SEPARATOR.'footer.php');
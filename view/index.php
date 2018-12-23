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
				<img class="boxall " src="<?php siteURL()?>/<?=$ln->post_thumbnail;?>" alt="<?=$ln->post_name;?>">	
				
				
				<div class="contents">
					<em class="text-justify"><?=$ln->post_content;?></em>
				</div>

				<div class="social">
					
					<ul>
					
					<li class="left"> 
						<a href="#" class="btn btn-sm">
							<i class="fa fa-share-alt"></i>
							Compartilhar
							<i class="badge badge-light"> </i> 
					    </a>
					</li>

					<li class="left">
						<button class="btn btn-sm"> 
							<i class="fa fa-thumbs-o-up"></i>
							Gostei							
							<i class="badge badge-light">9 </i> 
					   </button>
					</li>
					
					<li class="left"> 
						<button class="btn btn-sm"> autor 
							<i class="fa fa-user-o"></i>
							<i class="badge badge-light"> </i> 
					    </button>
					</li>
					
					<li class="left">
						<button class="btn btn-sm"> View 
						<i class="badge badge-light">9 </i> 
					   </button>
					</li>

					<li> 
						<button class="btn btn-sm">
							<i class="fa fa-eye"></i>
							Ver
							<i class="badge badge-light"> </i> 
					    </button>
					</li>
					

					</ul>
				</div>

			</div>		
		<?php }	?>		
		</div>
		
		<div class="col s4 bg-verdeb">right</div>
	</div>
</div>
<?php 
// Requesting the footer file
require_once('templates'.DIRECTORY_SEPARATOR.'footer.php');
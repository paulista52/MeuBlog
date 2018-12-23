<div id="newsletter">

	<div class="forms sombra radius">
		<h2>NEWSLETTER</h2>
		<form class="col s12" method="post" action="newsletter.php?operation=create" >
			<div class="input-field col s12">
				<input id="newsnome" name="newsnome" type="text" class="validate">
				<label for="newsnome">Seu nome..</label>
			</div>

			<div class="input-field col s12">
				<input id="newsemail" name="newsemail" type="text" class="validate">
				<label for="newsemail">Seu e-mail.</label>
			</div>

			<div class="col s12">
				<button class="btn waves-effect waves-light" type="submit">
					Enviar
				</button>
				<button class="btn waves-effect waves-light red" type="reset">
					Limpar
				</button>
			</div>
		</form>
	</div>

	<div class="forms-cad sombra radius">
		<h2>CRIAR USUÁRIO</h2>
		<form class="col s12" method="post" action="../controller/userController.php?operation=create" >
			<div class="input-field col s12">
				<input id="username" name="username" type="text" class="validate">
				<label for="username">Informe seu nome..</label>
			</div>

			<div class="input-field col s12">
				<input id="useremail" name="useremail" type="email" class="validate">
				<label for="useremail">Informe seu e-mail.</label>
			</div>

			<div class="input-field col s12">
				<input id="userpassword" name="userpassword" type="password" class="validate">
				<label for="userpassword">Informe um senha.</label>
			</div>

			<div class="col s12">
				<button class="btn waves-effect waves-light" type="submit">
					<input type="hidden" name="usertype" value="assinante">
					Enviar
				</button>
				<button class="btn waves-effect waves-light red" type="reset">
					Limpar
				</button>
			</div>
		</form>
	</div>

	<div class="anuncio-1 sombra">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- grande -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:1050px"
		     data-ad-client="ca-pub-9326816146231876"
		     data-ad-slot="4713695549"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

</div>


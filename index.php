<html>

<head>
	<meta charset="utf-8" />
	<title>App Mail Send</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
	<div class="container">

		<div class="py-3 text-center">
			<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
			<h2>Send Mail</h2>
			<p class="lead">Seu app de envio de e-mails particular!</p>
		</div>
		<div id="spinner" class="d-none justify-content-center">
			<div class="spinner-border text-success" role="status">
				<span class="sr-only">Loading...</span>
			</div>
			<strong style="padding: 4px 0 0 3px">Enviando ...</strong>
		</div>
		<div class="row">
			<div class="col-md-12">

				<div class="card-body font-weight-bold">
					<form action="valida_email.php" method="post">
						<div class="form-group">
							<label for="para">Para</label>
							<input name="email" type="text" class="form-control" id="para" placeholder="joao@dominio.com.br">
						</div>

						<div class="form-group">
							<label for="assunto">Assunto</label>
							<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
						</div>

						<div class="form-group">
							<label for="mensagem">Mensagem</label>
							<textarea name="mensagem" class="form-control" id="mensagem"></textarea>
						</div>

						<button type="submit" class="btn btn-primary btn-lg" onclick="spinner()">Enviar Mensagem</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button hidden id="butaoModal" data-toggle="modal" data-target="#exampleModal">
	</button>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="titleModal" class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div id="bodyModal" class="modal-body">

				</div>
				<div class="modal-footer">
					<button id="butaoRodape" type="button" class="btn " data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script>
		function spinner() {
			//   let disparaspinner = false;
			let spn = document.getElementById('spinner');
			spn.classList.remove('d-none');
			spn.classList.add('d-flex');
		};
		let url = window.location.href;
		url = url.split('?');
		//console.log(url.split('?'))
		let titulo = document.getElementById('titleModal');
		let conteudo = document.getElementById('bodyModal');
		let p = document.createElement('p');
		let botao = document.getElementById('butaoRodape');
		let butaoModal = document.getElementById('butaoModal');
		if (url[1] == 'sucesso') {
			titulo.innerHTML = 'Enviado com Sucesso';
			p.innerText = 'Seu e-mail foi encamminhado com sucesso!';
			conteudo.appendChild(p);
			conteudo.classList.add('text-success');
			botao.classList.add('btn-success');
			butaoModal.click();
		} else if (url[1] == 'erro') {
			titulo.innerHTML = 'Erro no envio';
			p.innerText = 'Seu e-mail não pode ser encaminhado, favor tente mais tarde.';
			conteudo.appendChild(p);
			conteudo.classList.add('text-danger');
			botao.classList.add('btn-danger');
			butaoModal.click();
		} else if (url[1] == 'errovalidacao') {
			titulo.innerHTML = 'Erro no envio';
			p.innerText = 'Favor preencha todos os campos!';
			conteudo.appendChild(p);
			conteudo.classList.add('text-secondary');
			botao.classList.add('btn-warning');
			butaoModal.click();
		}
	</script>
</body>

</html>
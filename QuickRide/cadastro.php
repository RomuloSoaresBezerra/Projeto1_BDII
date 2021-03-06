<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Cadastro</title>

		<!-- css -->
		<link rel="stylesheet" href="assets/js/sweetalert/dist/sweetalert.css">
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bower_components/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
	</head>
	<body>

		<nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
			<div class="container">
				<div class="navbar-header">

					<!-- logo -->
					<div class="site-branding">
						<a class="logo" href="index.html"> <!-- logo image  --> <img src="assets/images/logo.png" alt="Logo"> QuickRide </a>
					</div>

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div><!-- /.navbar-header -->

			</div><!-- /.container -->
		</nav>

		<header id="site-header" class="site-header valign-center">
			<div class="intro">

				<section id="registration" class="section registration">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h3>Cadastro de Usuários</h3>
							</div>
						</div>

						<form method="post" action="cadastro.php">
							<!-- id="registration-form" -->
							<div class="row">
								<div class="col-md-12" id="registration-msg" style="display:none;">
									<div class="alert"></div>
								</div>
								<br/>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Nome" id="fname" name="nome" required>
									</div>

									<div class="form-group">
										<input type="text" class="form-control" placeholder="Sobrenome" id="lname" name="sobrenome" required>
									</div>

									<div class="form-group">
										<input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
									</div>

									<div class="form-group">
										<input type="date" class="form-control" placeholder="Nascimento" id="cell" name="nascimento" required>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<input type="tel" class="form-control" placeholder="Telefone" id="address" name="telefone" required>
									</div>

									<div class="form-group">
										<input type="password" class="form-control" placeholder="Senha" id="zip" name="senha" required>
									</div>

									<div class="form-group">
										<select class="form-control" name="sexo" id="city" required>
											<option readonly>Masculino</option>
											<option>Feminino</option>
											<option>Outro</option>
										</select>
									</div>
								</div>
							</div>
							<div class="text-center mt20">
								<input type="submit" class="btn btn-black" value="Cadastrar" name="cadastrar" id="registration-submit-btn">
							</div>
						</form>
					</div>
				</section>
			</div>
		</header>

		<!-- script -->
		<script src ="assets/js/sweetalert/dist/sweetalert.min.js"></script>
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>
<?php

	//Inclue o arquivo
	include ("crudMySql.php");
	
	//Verifica o clique do botão Cadastrar
	if (!empty($_POST['cadastrar'])) {
			
		//Concatena nome e sobrenome
		$nome = $_POST['nome'] . ' ' . $_POST['sobrenome'];
	
		//Array com os dados para inserção
		$usuario = array(
			'email' => $_POST['email'], 
			'nome' => $nome, 
			'senha' => $_POST['senha'], 
			'sexo' => $_POST['sexo'], 
			'telefone' => $_POST['telefone'], 
			'nascimento' => $_POST['nascimento']);
			
		//Inicia a sessão
		session_start();
	
		//Verifica e executa a inserção na tabela dos dados do array $usuario no banco
		if (create_database('usuario', $usuario)) {
			
			//Emite mensagem de cadastro de sucesso e redireciona a página
			echo "<script>
						sweetAlert('Usuário Cadastrado', 'Cadastro feito com sucesso', 'success');
						setTimeout(function() { location.href='login.php' }, 3000);
				  </script>";
	
		} 
		//Verifica se a inserção teve falha e emite mensagem de insucesso do cadastro de usuário
		else {
				
			//Emite mensagem de falha de cadastro do usuário
			echo "<script>
						sweetAlert('Falha no Cadastro', 'Houve falha ao cadastrar o usuário', 'error');
				  </script>";
		}
	
	}

?>

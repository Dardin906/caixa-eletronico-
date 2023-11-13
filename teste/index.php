<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>teste</title>
</head>
<script>
  function valida_usario() {
    console.log("OK");
  }
</script>
<body> 
    <form action="valida_usuario.php" method="post">
      <label>Usuário: <input type="text" id="usuario" name="usuario"></label>
      <label>Senha: <input type="password" id="senha" name="senha"></label>
      <input type="submit" value="login">
    </form>
</body>
</html>
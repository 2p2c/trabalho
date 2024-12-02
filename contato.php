<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mensagemEnviada = true;
} else {
    $mensagemEnviada = false;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Contato</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<div class="header">
      <div class="nav esquerda">
          <a href="home.php">Home</a>
          <a href="galeria.php">Galeria</a>
      </div>
      <img src="./imgs/logo2.png" alt="Galeria Online de Arte">
      <div class="nav direita">
          <a href="artista.php">Artistas</a>
          <a href="contato.php">Contato</a>
      </div>
</div>
  </nav>
</header>

  <section id="contato">
    <h1>Deixe sua mensagem</h1>
    <form action="salvar_dados.php" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
      <label for="mensagem">Mensagem:</label>
      <textarea id="mensagem" name="mensagem" required></textarea>
      <button type="submit" class="enviar">Enviar</button>
    </form>

    <?php if ($mensagemEnviada): ?>
        <div class="aviso">
            Mensagem enviada com sucesso!
        </div>
    <?php endif; ?>
    
  </section>

  <div class="mensagens1">
    <h1>Últimas mensagens</h1>
    </div>

<?php
$servername = "127.0.0.1"; 
$username = "root";
$password = "nova_senha"; 
$dbname = "formulario_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT mensagem, nome, email FROM dados_formulario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="grid-mensagens">';
  while ($row = $result->fetch_assoc()) {
      echo '<div class="mensagens">';
      echo '<h3>' . $row["nome"] .'</h3>';
      echo '<p><strong>Email:</strong> ' . $row["email"] .'</p>';
      echo '<p><strong>Mensagem:</strong> ' . $row["mensagem"] .'</p>';
      echo '</div>';
  }
  echo '</div>';
} else {
  echo '<p>Nenhum registro encontrado.</p>';
}

$conn->close();
?>

<footer class="footer">
    <div class="footer1">
    <div class="alunos"> Alunos: Paulo Cesar, Luana Pires, Artur Severo, Davi Feitosa</div> 
    <div class="copia">
      <a href="https://docs.google.com/document/d/1btBh8AaKVEidDtbicwgIeQRCrq20WUsIarO02PSTzH8/edit?tab=t.0#heading=h.vuupm6jpllsmf" target="_blank">&copy; 2024 Galeria de Arte Online</a>
  </div>
      <div class="link">
      <a href="https://www.instagram.com/galeria_art_on/profilecard/?igsh=MTA1OWQ1ZXR6bzEzcw==" target="_blank">
      <img src="./imgs/instagram.png" alt="Instagram" class="links1">
      </div>
      </div>
  </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Recebidos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dados Recebidos</h1>
        <nav>
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="desenvolvedores.html">Desenvolvedores</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Informações Cadastradas</h2>
        <?php
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        $foto = $_FILES['foto'] ?? null;
        $fotoPath = '';
        if ($foto && $foto['error'] === UPLOAD_ERR_OK) {
            $fotoName = basename($foto['name']);
            $fotoPath = $uploadDir . $fotoName;

            if (move_uploaded_file($foto['tmp_name'], $fotoPath)) {
                echo "<p><strong>Foto de Perfil:</strong></p>";
                echo "<img src='$fotoPath' alt='Foto de Perfil' style='width: 150px; height: 150px; border-radius: 50%;'><br>";
            } else {
                echo "<p>Erro ao salvar a foto.</p>";
            }
        } else {
            echo "<p>Foto não enviada ou ocorreu um erro.</p>";
        }

        echo "<p><strong>Nome Completo:</strong> " . htmlspecialchars($_POST['nome'] ?? 'Não informado') . "</p>";
        echo "<p><strong>E-mail:</strong> " . htmlspecialchars($_POST['email'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Senha:</strong> " . htmlspecialchars($_POST['senha'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Idade:</strong> " . htmlspecialchars($_POST['idade'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Site Pessoal:</strong> " . htmlspecialchars($_POST['site'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Data de Nascimento:</strong> " . htmlspecialchars($_POST['data-nascimento'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Cor Favorita:</strong> <span style='color:" . htmlspecialchars($_POST['cor-favorita'] ?? '#000') . ";'>" . htmlspecialchars($_POST['cor-favorita'] ?? 'Não informado') . "</span></p>";
        echo "<p><strong>Telefone:</strong> " . htmlspecialchars($_POST['telefone'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Nível de Satisfação:</strong> " . htmlspecialchars($_POST['satisfacao'] ?? 'Não informado') . "</p>";
        echo "<p><strong>Pesquisa:</strong> " . htmlspecialchars($_POST['pesquisa'] ?? 'Não informado') . "</p>";
        ?>
    </main>
    <footer>
        <p><a href="https://portal.ifrn.edu.br/campus/santa-cruz" target="_blank">IFRN Campus Santa Cruz</a></p>
        <p>Trabalho de Autoria Web</p>
        <p>Prof. Marcelo Figueiredo Barbosa Júnior</p>
        <p>Ana Luiza de Lima Camilo</p>
        <p><a href="https://www.w3schools.com/" target="_blank">Referências Utilizadas</a></p>
      </footer>
</body>
</html>

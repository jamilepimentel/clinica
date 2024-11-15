<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $data_nascimento = $_POST['data_nascimento'];
    $email = trim($_POST['email']);
    $telefone = preg_replace('/\D/', '', $_POST['telefone']);
    $endereco = trim($_POST['endereco']);
    $sexo = $_POST['sexo'];

    $erros = [];

    // Validações
    if (empty($nome)) {
        $erros[] = "O nome é obrigatório.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O e-mail é inválido.";
    }
    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $erros[] = "O telefone deve conter 10 ou 11 dígitos.";
    }
    if (new DateTime($data_nascimento) > new DateTime('18 years ago')) {
        $erros[] = "O paciente deve ser maior de idade.";
    }

    if (empty($erros)) {
        // Conexão com o banco de dados
        $conn = new mysqli('localhost:3307', 'root', '', 'clinica_medica');

        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO pacientes (nome, data_nascimento, email, telefone, endereco, sexo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $data_nascimento, $email, $telefone, $endereco, $sexo);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar: " . $stmt->error . "</div>";
        }

        $stmt->close();
        $conn->close();
    } else {
        foreach ($erros as $erro) {
            echo "<div class='alert alert-danger'>$erro</div>";
        }
    }
}
?>
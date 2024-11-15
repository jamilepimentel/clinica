
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <div class="container mt-5">
        <h1 class="mb-4">Cadastro de Pacientes</h1>
        <form action="cadastrar_paciente.php" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
                <div class="invalid-feedback">O nome é obrigatório.</div>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
                <div class="invalid-feedback">Insira uma data de nascimento válida.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div class="invalid-feedback">Insira um e-mail válido.</div>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" required pattern="\d{10,11}">
                <div class="invalid-feedback">Insira um telefone válido (10 ou 11 dígitos).</div>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <select name="sexo" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
                <div class="invalid-feedback">Selecione uma opção.</div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script>
        // Validação do formulário
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>
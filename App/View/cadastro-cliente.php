<?php

use App\Controller\ClienteController;

if (isset($_POST["save"])) {
    unset($_POST["save"]);
    $clientObj = new ClienteController();
    $responseCreate = $clientObj->createClient($_POST);
    if($responseCreate["status"] == false){
        errorMessage($responseCreate["message"]);
    }
    else {
        successMessage($responseCreate["message"]);
    }
}

$data = [
    "nome" => isset($_POST["nome"]) ? $_POST["nome"] : "",
    "cpf" => isset($_POST["cpf"]) ? $_POST["cpf"] : "",
    "cep" => isset($_POST["cep"]) ? $_POST["cep"] : "",
    "bairro" => isset($_POST["bairro"]) ? $_POST["bairro"] : "",
    "numero" => isset($_POST["numero"]) ? $_POST["numero"] : "",
    "endereco" => isset($_POST["endereco"]) ? $_POST["endereco"] : "",
    "cidade" => isset($_POST["cidade"]) ? $_POST["cidade"] : "",
    "estado" => isset($_POST["estado"]) ? $_POST["estado"] : "",
];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/cadastro-cliente.css">
    <!-- Plugin do Sweet Alert, para os modais de resposta -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <title>Prime Results</title>
</head>

<body>
    <header>
        <div>
            <a href="home">Home</a>
        </div>
        <div>
            <a href="listagem-clientes">Listagem de Clientes</a>
        </div>
        <div>
            <a href="cadastro-cliente" class="active">Cadastro de Clientes</a>
        </div>
        <div>
            <a href="relatorios">Relatórios</a>
        </div>
    </header>
    <main>
        <h1>
            <i class="fa fa-solid fa-user-plus"></i>
            Cadastro de cliente
        </h1>
        <h2>Preencha todos os dados corretamente para cadastrar o cliente!</h2>
        <h2>Obs: Ao preencher o CEP, o restante do endereço é preenchido automáticamente!</h2>
        <section>
            <form method="POST" id="saveForm">
                <input type="text" id="nome" name="nome" placeholder="Nome" value="<?= $data["nome"] ?>">
                <input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?= $data["cpf"] ?>">
                <div class="double-inputs">
                    <input type="text" id="cep" name="cep" placeholder="CEP" value="<?= $data["cep"] ?>">
                    <input type="text" id="numero" name="numero" placeholder="Número" value="<?= $data["numero"] ?>">
                </div>
                <input type="text" id="endereco" name="endereco" placeholder="Endereço" value="<?= $data["endereco"] ?>">
                <input type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?= $data["bairro"] ?>">
                <input type="text" id="cidade" name="cidade" placeholder="Cidade" value="<?= $data["cidade"] ?>">
                <input type="text" id="estado" name="estado" placeholder="Estado" value="<?= $data["estado"] ?>">
                <div class="buttons">
                    <button type="submit" name="save">Salvar</button>
                    <button type="reset">Limpar campos</button>
                </div>
            </form>
        </section>
    </main>
    <!-- Plugin do JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= ASSETS_DIR ?>js/cadastro-cliente.js"></script>
</body>

</html>

<?php

function errorMessage(string $message): void
{
    $message = addslashes($message);

    echo <<<HTML
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      window.addEventListener("load", function () {
        Swal.fire({
          title: "Erro!",
          text: "$message",
          icon: "error",
          confirmButtonText: "Fechar"
        });
      });
    </script>
    HTML;
}

function successMessage(string $message): void {
    $message = addslashes($message);

    echo <<<HTML
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      window.addEventListener("load", function () {
        Swal.fire({
          title: "Sucesso!",
          text: "$message",
          icon: "success",
          confirmButtonText: "Ok!"
        })
        .then(()=>{
            window.location.href = "http://localhost/prime-results/listagem-clientes";
        });
      });
    </script>
    HTML;
}

?>
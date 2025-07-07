<?php

use App\Controller\ClienteController;

$clientObj = new ClienteController();
$data = $clientObj->getClientes();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/listagem-clientes.css">
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
            <a href="listagem-clientes" class="active">Listagem de Clientes</a>
        </div>
        <div>
            <a href="cadastro-cliente">Cadastro de Clientes</a>
        </div>
        <div>
            <a href="relatorios">Relatórios</a>
        </div>
    </header>
    <main>
        <h1>
            <i class="fa fa-solid fa-users"></i>
            Listagem de Clientes
        </h1>
        <h2>Aqui você pode ver os dados dos clientes, alterar ou apagar!</h2>
        <section>
            <table>
                <thead>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php if (count($data) == 0) { ?>
                        <tr>
                            <td colspan="5" class="empty">Nenhum dado cliente cadastrado!</td>
                        </tr>
                    <?php }
                    foreach ($data as $cliente) { ?>
                        <tr class="row-<?= $cliente["id"] ?>">
                            <td><?= $cliente["id"] ?></td>
                            <td><?= $cliente["nome"] ?> </td>
                            <td><?= $cliente["cpf"] ?></td>
                            <td><?= $cliente["cep"] ?></td>
                            <td class="actions">
                                <div>
                                    <a href="editar-cliente/<?= $cliente["id"] ?>"><i class="action fa fa-solid fa-user-pen"></i> Editar</a>
                                    <button class="delete" data-id="<?= $cliente["id"] ?>" ><i class="action fa fa-solid fa-trash"></i> Apagar</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="mobile-table">
                <?php if (count($data) == 0) { ?>
                    <div>
                        <h2 class="empty-mobile">Nenhum dado cliente cadastrado!</h2>
                    </div>
                <?php }
                foreach ($data as $cliente) { ?>
                    <div class="table-row row-<?= $cliente["id"] ?>">
                        <div><span>#ID:</span> <?= $cliente["id"] ?></div>
                        <div><span>Nome:</span> <?= $cliente["nome"] ?> </div>
                        <div><span>CPF:</span> <?= $cliente["cpf"] ?></div>
                        <div><span>CEP:</span> <?= $cliente["cep"] ?></div>
                        <div class="actions">
                            <div>
                                <a href="editar-cliente/<?= $cliente["id"] ?>"><i class="action fa fa-solid fa-user-pen"></i> Editar</a>
                                <button class="delete" data-id="<?= $cliente["id"] ?>" ><i class="action fa fa-solid fa-trash"></i> Apagar</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
    <!-- Plugin do JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= ASSETS_DIR ?>js/listagem-clientes.js"></script>
</body>

</html>
<?php

use App\Controller\BairroCepController;
use App\Controller\ClienteController;

$clientReport = (new ClienteController())->getClientes("all");
$cepsPorBairroReport = (new BairroCepController())->getCepsPorBairro();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/relatorios.css">
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
            <a href="cadastro-cliente">Cadastro de Clientes</a>
        </div>
        <div>
            <a href="relatorios" class="active">Relatórios</a>
        </div>
    </header>
    <main>
        <h1>
            <i class="fa fa-solid fa-file-lines"></i>
            Confira aqui os Relatórios
        </h1>
        <h2>Selecione o relatório que deseja visualizar</h2>
        <section>
            <div class="report-selection">
                <div class="option active-option user-report">Usuários</div>
                <div class="option bairro-report">Quantidade de CEPs por bairro</div>
                <div class="option maisdeum-report">Bairros com mais de um CEP</div>
            </div>
            <div class="user-report-content">
                <div class="search-inputs">
                    <input type="text" id="filtro-nome" placeholder="Buscar por nome">
                    <input type="text" id="filtro-cpf" placeholder="Buscar por CPF">
                </div>
                <div class="desktop-table">
                    <table>
                        <thead>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>CEP</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            <?php if (count($clientReport) == 0) { ?>
                                <tr>
                                    <td colspan="9" class="empty">Nenhum dado cliente cadastrado!</td>
                                </tr>
                            <?php } ?>
                            <?php foreach ($clientReport as $cliente) { ?>
                                <tr>
                                    <td><?= $cliente["id"] ?></td>
                                    <td><?= $cliente["nome"] ?></td>
                                    <td><?= $cliente["cpf"] ?></td>
                                    <td><?= $cliente["cep"] ?></td>
                                    <td><?= $cliente["endereco"] ?></td>
                                    <td><?= $cliente["numero"] ?></td>
                                    <td><?= $cliente["bairro"] ?></td>
                                    <td><?= $cliente["cidade"] ?></td>
                                    <td><?= $cliente["estado"] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="mobile-table">
                        <?php if (count($clientReport) == 0) { ?>
                            <div>
                                <h2 class="empty-mobile">Nenhum dado cliente cadastrado!</h2>
                            </div>
                        <?php }
                        foreach ($clientReport as $cliente) { ?>
                            <div class="table-row row-<?= $cliente["id"] ?>">
                                <div><span>#ID:</span> <?= $cliente["id"] ?></div>
                                <div><span>Nome:</span> <?= $cliente["nome"] ?> </div>
                                <div><span>CPF:</span> <?= $cliente["cpf"] ?></div>
                                <div><span>CEP:</span> <?= $cliente["cep"] ?></div>
                                <div><span>Endereço:</span> <?= $cliente["endereco"] ?></div>
                                <div><span>Número:</span> <?= $cliente["numero"] ?></div>
                                <div><span>Bairro:</span> <?= $cliente["bairro"] ?></div>
                                <div><span>Cidade:</span> <?= $cliente["cidade"] ?></div>
                                <div><span>Estado:</span> <?= $cliente["estado"] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="bairro-report-content" style="display: none;">
                <div class="bairro-container">
                    <div class="bairro-header">
                        <div>Bairro</div>
                        <div>Quantidade</div>
                    </div>
                    <div class="bairro-body">
                        <?php foreach ($cepsPorBairroReport as $cep) { ?>
                            <div class="bairro-row">
                                <div><?= $cep["bairro"] ?></div>
                                <div><?= $cep["quantidade"] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="maisdeum-report-content" style="display: none;">
                <div class="bairro-container">
                    <div class="bairro-header">
                        <div>Bairro</div>
                        <div>Quantidade</div>
                    </div>
                    <div class="bairro-body">
                        <?php foreach ($cepsPorBairroReport as $cep) { ?>
                            <?php if($cep["quantidade"] <= 1){ continue; }?>
                            <div class="bairro-row">
                                <div><?= $cep["bairro"] ?></div>
                                <div><?= $cep["quantidade"] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Plugin do JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= ASSETS_DIR ?>js/relatorios.js"></script>
</body>

</html>
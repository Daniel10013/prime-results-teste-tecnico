<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/home.css">
    <title>Prime Results</title>
</head>

<body>
    <header>
        <div>
            <a href="home" class="active">Home</a>
        </div>
        <div>
            <a href="listagem-clientes">Listagem de Clientes</a>
        </div>
        <div>
            <a href="cadastro-cliente">Cadastro de Clientes</a>
        </div>
        <div>
            <a href="relatorios">Relatórios</a>
        </div>
    </header>
    <main>
        <h1>Olá! O que você deseja fazer agora?</h1>
        <section class="action-sections">
            <a href="cadastro-cliente">
                <i class="fa fa-solid fa-user-plus"></i>
                <span>Cadastrar um novo cliente</span>
            </a>    
            <a href="listagem-clientes">
                <i class="fa fa-solid fa-users"></i>
                <span>Visualizar os Clientes Cadastrados</span>
            </a>   
            <a href="relatorios">
                <i class="fa fa-solid  fa-file-lines"></i>
                <span>Conferir relatórios</span>
            </a>   
        </section>
    </main>
</body>

</html>
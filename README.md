
# Prime Results - Teste Técnico 

Esse é um simples projeto criado para a realização do teste técnico do processo seletivo da Prime Results, o projeto consiste em um simples sistema de gerenciamento de clientes com as seguintes funcionalidades: 
* Cadastro, Alteração, Exclusão de clientes
* Validação de CPF
* Integração com API de CEP (Viacep) no cadastro / edição
* Listagem Simples
* Geração de relatórios simples

Para esse projeto foram usadas as seguintes tecnologias: 

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![jQuery](https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white)

## Como rodar o projeto?

Para fazer o projeto funcionar é fácil! A primeira coisa é baixar / rodar um servidor web para PHP e MySql, no meu caso utilizei o [XAMMP](https://www.apachefriends.org/pt_br/index.html), após ter ambos os servidores rodando e funcionando, você precisa criar o banco de dados, na pasta base do projeto você irá encontrar um arquivo `database.sql`, basta executar, e seu banco de dados estará pronto!

Após ter feito esses passos, basta configurar o seu arquivo `.env`, na pasta base você encontrará um arquivo `.env.example`, basta renomear para `.env` e alterar os dados, seu arquivo deve ser parecido com esse, com seus dados do banco é claro.
```env
DB_PASS="database_pass"
DB_NAME="database_name"
DB_USER="database_user"
DB_HOST="database_host"

```

Se você seguiu todos os passos e configurações corretamente, parabéns, seu projeto já está funcionando e pode ser testado!

Abaixo segue um exemplo visual de como estão as telas do site (todas responsivas)

## Home
![home]('Images/home.png')

## Listagem
![listagem]('Images/listagem.png')

## Cadastro
![cadastro]('Images/cadastro.png')

## Relatórios
![relatorios]('Images/cadastro.png')

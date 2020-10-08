# Projeto Desafio Nano, 2º etapa processo seletivo.

O presente projeto foi desenvolvido utilizando: HTML5, CSS3, PHP7, PDO, DAO, Javascript, Bootstrap 4, Slim, Rain e chart.js

Instruções do projeto

1 - Crie um banco de dados com o nome: db_challenge

2 - Importe o arquivo tb_challenge.sql que está na pasta sql

3 - Para rodar a aplicação
3.1 - Abra o projeto usando seu apache apontando para pasta raiz do projeto, onde está o arquivo index.php
3.2 - Se estiver dentro do htdocs do xampp, utilize o caminho localhost:ProjetoDesafio
3.3 - Caso utilize variaveis de ambiente do sistema, basta apontar a raiz do diretório, como: Localhost:8089
3.4 - Ao executar a aplicação, utilize o login: admin@desafio.com e a senha: admin para acessar a aplicação

4 - Página inícial
4.1 - Na página inícial, esta sendo exibido a quantidade de funcionário, quantidade de movimentações do tipo Entrada e também do tipo Saída e um gráfico estático
4.2 - Ao clicar no menu, você terá as opções: Nome do administrador (Pego através do login), Funcionários e Movimentações
4.3 - Ao clicar em Nome do administrador, você pode acessar o perfil para ver as informações do administrador ou Sair (Logout)

5 - Funcionários
5.1 - Ao clicar em Funcionários, será exibido todos os funcionários cadastrados do banco
5.2 - Para cada funcionário, existe 3 botões, Editar, Extrato, Excluir
5.3 - Ao clicar em Editar, será exibido as informações do funcionário selecionado, podendo alterar as informações e salvar
5.4 - Clicando em Extrado, será exibido todas as movimentações correspondente ao funcionário selecionado
5.5 - Nesta página você pode cadastrar uma nova movimentação para esse funcionário, e ao cadastrar, o valor dessa movimentação causará impacto no saldo deste funcionário
5.6 - Clicando em excluir, será exibido um alerta pedindo uma confirmação de que realmente quer excluir o funcionário
5.7 - Na parte superior extá sendo exibido um filtro, para caso queira procurar um usuário específico, utilizando nome do funcionário ou data de criação

6 - Movimentações
6.1 - No menu, ao clicar em movimentações, será exibido uma lista com todas as movimentações encontradas no banco
6.2 - Nesta página, na parte superior, estará sendo exibido uma opção de filtro, que pode ser feito por filtro, pelo nome do funcionário ou pela data de criação.

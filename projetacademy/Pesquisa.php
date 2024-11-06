<header>ACADEMIA SPARTA</header>
   

   <nav id="fachada">
       <a  href="FichadoAluno.html">FICHA DO ALUNO</a>
       <a href="Tela inicial.html">TELA INICIAL</a>
   </nav>
  
<div id="cadastro">Pesquisa</div>

<?php

$pesquisa = $_POST['busca']??'';

include "connection.php";

$sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%'";

$dados = mysqli_query ($conn ,$sql);
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloCadastroAlunos.css">
    <link rel="shortcut icon" href="" type="image/x-icon"/>
    <title>Cadastro de Alunos</title>
</head>

<body>
 <form action="Pesquisa.php" method="POST">

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name ="busca">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
          </form>
   </nav>
<table>
<thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">CPF</th>
        <th scope="col">Telefone</th>
        <th scope="col">Celular</th>
        <th scope="col">Email</th>
        <th scope="col">funções</th>
    </tr>

</thead>

<tbody>
<?php
while ($linha = mysqli_fetch_assoc($dados)) {
    $nome = $linha ['nome'];
    $data_nascimento = $linha ['data_nascimento'];
    $cpf = $linha ['cpf'];
    $telefone = $linha ['telefone'];
    $celular = $linha ['celular'];
    $email = $linha ['email'];
//$data_nascimento = mostrar_data($data_nascimento);
    echo "<tr>
    <th scope = 'row'>$nome</th>
    <td> $data_nascimento</td>
    <td><$cpf</td>
    <td>$telefone</td>
    <td>$celular</td>
    <td>$email</td>
    <td>
    <a href='CadastrodeAlunosEdit.php?id=$linha[id]' <button>Editar</button> </a>
    
        <button>Excluir</button>
    </td>
    
    </tr>";



}
?>
</tbody>

</table>

</body>
<footer>
    EQUIPE DE DESENVOLVIMENTO WEB:
    JACKSON ANDRADE / ANTHONY PETERSON
    <br>   
</footer>
</html>
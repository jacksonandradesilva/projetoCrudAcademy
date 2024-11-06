
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloCadastroAlunos.css">
    <link rel="shortcut icon" href="" type="image/x-icon"/>
    <title>Cadastro de Alunos</title>
</head>

<body>

<?php

require "connection.php";

$alunos = "SELECT id FROM alunos";
$rsalunos = mysqli_query($conn,$alunos);

if(isset($_GET['id']))
{
$id= $_GET['id'];  // recebe o valor do id recebido
$sql= "SELECT * FROM alunos WHERE id =$id";
$rs = mysqli_query($conn,$sql); // executar consulta do id
$linha = mysqli_fetch_assoc($rs);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome= $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST ['cpf'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $sqlSelect= "UPDATE alunos SET nome = '$nome', data_nascimento = '$data_nascimento', cpf ='$cpf', 
                 telefone = '$telefone', celular = '$celular', email = '$email', endereco = '$endereco' WHERE id = $id";

if(mysqli_query($conn , $sqlSelect)){
    header('Location: Pesquisa.php');
}
else{
    echo "error; ".mysqli_error($conn);
}
}



      }


?>

 //include 'connection.php';

//$id = $_GET ['id'] ?? '';
//$sql = "SELECT * FROM alunos WHERE id = $id";

//$dados = mysqli_query ($conn ,$sql);
//$linha = mysqli_fetch_assoc($dados);

?>
   

    <header>ACADEMIA SPARTA</header>
   

    <nav id="fachada">
        <a  href="FichadoAluno.html">FICHA DO ALUNO</a>
        <a href="Tela inicial.html">TELA INICIAL</a>
    </nav>
   
<div id="cadastro">Alteração Cadastro dos Alunos</div>

  <nav>
    
</nav>


<form action="CadastrodeAlunosEdit.php" method="POST">

  <fieldset>

    <legend><p>Cadastro dos Alunos</p></legend>
    <label for="nome"></label>Nome do Aluno (a):</Nome></label>
    <input type="text"  name="nome" required value ="<?php $linha['nome'];?>" >

    <label for="data_nascimento"> Data de Nascimento:</label>
    <input type="date" name= "data_nascimento"required value ="<?php $linha['data_nascimento'];?>" >


    <label for="cpf"></label>CPF:</label>
    <input type="text" name = "cpf" require value ="<?php $linha['cpf'];?>">

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone"require value ="<?php $linha['telefone'];?>">

    <label for="celular">Celular:</label>
    <input type="text" name="celular"require value ="<?php $linha['celular'];?>">
    
    <label for="email">Email:</label>
    <input type="email" name="email"require value ="<?php $linha['email'];?>">

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco"require value ="<?php $linha['endereco'];?>">

</fieldset>   
      
        
       

   <fieldset>

   <legend><p>Endereço</p></legend>
   <label for="tipo_endereco">TIPO:</label>

   <select id="tipo_endereco">

    <option value="">Selecione</option>
    <option value="">Rua</option>
    <option value="">Estrada</option>
    <option value="">Rodovia</option>
    <option value="">outros</option>
    <option value="">Avenida</option>

    </select>

  <label for="logradouro_endereco">Logradouro:</label>
  <input type="text"id:"logradouro_endereco"/>
  <label for="numero_endereco">Numero:</label>
  <input type="text"id: "numeroendereco"/>
  <label for="complemento_endereco">Complemento</label>
  <input type="text" id: "complemento_endereco"/>
  <label for="cep">Cep:</label>
  <input type="text" id:"cep"/>
  <label for="bairro">Bairro:</label>
  <input type="text" id: "bairro"/>

  </fieldset>

  <fieldset>
    <label for="modalidade">MODALIDADE:</label>
    <label><select id="modalidade">
    <option value="">Selecione</option>
    <option value="">MUSCULAÇÃO</option>
    <option value="">AEOROBICA</option>
    <option value="">JIU-JITSU</option>
    <option value="">JUDO</option>
    <option value="">CROSS-FIT</option>
    </select>
  
    <legend><p>Observações:</p></legend>
    <label for="msg">Mensagem:</label>
    <textarea name="mensagem" cols="80" rows="3"></textarea>
  </fieldset>

  <fieldset>
    <button type="submit">Salvar alterações </button>
    <button type="reset"> Limpar Mensagem </button>
  </fieldset>

</form> 


</body>
<footer>
    EQUIPE DE DESENVOLVIMENTO WEB:
    JACKSON ANDRADE / ANTHONY PETERSON
    <br>   
</footer>
</html>


<?php

    include_once('connection.php');

    $name = $_POST['nome']; 
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $sql= "INSERT INTO `alunos`(`nome`, `data_nascimento`, `cpf`, `telefone`, `celular`, `email`, `endereco`) VALUES 
    ('$name','$data_nascimento','$cpf','$telefone','$celular','$email','$endereco')";

       
    if(mysqli_query($conn , $sql)) {

      echo "$name Cadastrado com Sucesso!";

    } else
     echo "$name Não foi cadastrado";
    

?>

<a href="Tela inicial.html"> TELA INICIAL</a>
<?php 
$operacao = $_POST["operacao"];
include "conexao.php";

if ($operacao=="cadastrar"){
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $sql = "INSERT INTO agenda VALUES ";
    $sql .= "('$nome','$telefone',NULL)";
    $resultado = $mysqli->query($sql);
    echo "Contato adicionado com sucesso!";
    }
    elseif ($operacao=="excluir"){
        $id = $_POST["id"];
        if(is_numeric($id)){
            $sql = "DELETE FROM agenda WHERE id_agenda = $id";
            $resultado = $mysqli->query($sql);
//             $linhas = mysqli_affected_rows();
//             if($linhas==1){echo "Produto excluído com sucesso!";}
//             else {echo "Produto não encontrado";}
        } else {echo "Produto inválido";}
    }
    
    elseif ($operacao=="mostrar"){
        $resultado = $mysqli->query("SELECT * FROM agenda");
        $linhas = $resultado->num_rows;
        echo "<p><b>Lista de Contatos:</b></p>";
        ?><table border="1"><thead><tr><th>Nome</th><th>Telefone</th><th>ID</th></tr></thead><?php
        for ($i=0; $i<$linhas; $i++){
            $reg = $resultado->fetch_row();
            ?><tbody><tr><td><?=$reg[0]?></td><td><?=$reg[1]?></td><td><?=$reg[2]?></td></tr><?php 
        }
    }
    
    elseif ($operacao=="alterar"){
        
    }
    
// $mysqli->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
       function lercsv($nome_arq) {
       // ler o arquivo tab_usuario.csv do disco e carregar em array na memoria do computador  
       // retornar o array criado 
       $file_name = $nome_arq;
       if(($handle = fopen($file_name, "r")) !== FALSE) {
        $i=0;
        while (($row = fgetcsv($handle, 0, ",")) !== FALSE) {
            $tab_arq[$i]=$row;
            $i++;
        }
        fclose($handle);  
       }   
       return $tab_arq;
    }

    $tab_usuario = lercsv("tab_usuario.csv");
      function lista_usuario($tab_usuario) {
        echo "<table>";
        echo "<tr>";
        echo "<td>id</td>";
        echo "<td>usuario</td>";
        echo "<td>senha</td>";
        echo "<td>perfil</td>";
        echo "</tr>";
    
        for($i=0;$i<count($tab_usuario);$i++) {
            echo "<tr>";
            echo "<td>";
            echo $tab_usuario[$i][0];
            echo "</td>";
            echo "<td>";
            echo $tab_usuario[$i][1];
            echo "</td>";
            echo "<td>";
            echo $tab_usuario[$i][2];
            echo "</td>";
            echo "<td>";
            echo $tab_usuario[$i][3];
            echo "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }
        // rotina de inclusao ao usuario 
        $qtduser=count($tab_usuario);
        $tab_usuario[$qtduser][0]=$qtduser+1;
        $tab_usuario[$qtduser][1]="user3";
        $tab_usuario[$qtduser][2]="user3123";
        $tab_usuario[$qtduser][3]="user";

        lista_usuario($tab_usuario);

    ?>
</body>
</html>
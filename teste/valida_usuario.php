<?php
//banco de dados csv ou json
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

        $user = $_POST["usuario"];
        $pass = $_POST["senha"];

        //perfil admin guest user 
    
$valide = val_usuario($user,$pass,$tab_usuario);

    if($valide=="admin") {
        header('location: admin.php'); 
    }
         else {
            if($valide=="user") {
            header('location: home.php');
        }
             else {
                if($valide=="guest") {
                    header('location: sobre.php');
                }
                else {
                    if($valide=="invalido") {
                      header('location: index.php');
                    }
                    else {
                        echo '
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta http-equiv="X-UA-compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Document</title>
                            </head>
                            <body>
                                <form action="cadastro.php" method="post">
                                <p>Você ainda não é um usuario cadastrado! </p>
                                <input type="submit" value="Cadastrar">
                                </form>
                            </body>
                            </html>';       
                    }
            }
        }
    }

//SELECT usuario,senha,perfil from tab_usuario where tab_usuario.usuario=$user
function pesquisa($valor,$campo,$tabela) {
    $ret=-1;   // nao encontrado 
       for($i=0;$i<count($tabela);$i++) {
           if($valor==$tabela[$i][$campo]) {
            if($ret<0) {
                $ret=$i;   
                break;
            }
        }
    }
    return $ret;
}
    function val_usuario($user,$pass,$tab_usuario) {
        $id=pesquisa($user,1,$tab_usuario);
        if($id>=0) { 
             if($pass==$tab_usuario[$id][2]) {
                return $tab_usuario[$id][3]; //retornar o pefil do usuario
        }        
        else {
               return "invalido";  //senha inválida 
        }
    }
    else {
         return "inexistente";
    }
}
echo "<br>";
?>

   
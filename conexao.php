
<?php
    //startou a session aqui para não ter que ficar fazendo isso
    //em todas as páginas php que precisam da session
    session_start();
    //parâmetros de acesso ao BD
    $servidor = "ip_do servidor";
    $usuario = "user";
    $senha = "senha";
    $nomeBD = "bdName";

    //obj de conexão com o banco
    $conexao = new mysqli($servidor, $usuario, $senha, $nomeBD);

    if($conexao->connect_error){
        die("Falha na conexão: " . $conexao->connect_error);
    }

?>
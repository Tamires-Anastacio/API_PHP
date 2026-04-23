<?php
    header("Content-Type: application/json; charset=UTF-8");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $arquivo = "usuarios.json";

    if(!file_exists($arquivo)){
        file_put_contents($arquivo,json_encode([],JSON_PRETTY_PRINT | JSON_UNESCAPE_UNICODE));
    }

    $usuarios = json_decode(file_get_contents($arquivo), true);

    //echo "Método de requisição:" .$metodo;

    //$usuarios = [
         //["id" => 1, "nome" => "Fulano", "email" => "fulano@email"],
        //["id" => 2, "nome" => "Rayanne", "email" => "rayanne@email"]

    //];

    switch ($metodo) {
        case 'GET':
            //echo "AQUI AÇÕES DO MÉTODO GET";
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            break;

        case 'POST':
            //echo "AQUI AÇÕES DO MÉTODO POST";
            $dados = json_decode(file_get_contents('php://input'),true);
            //print_r($dados);


        if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"]))
            http_response_code(400);
            echo json_encode(["erro" => "Dados incompletos."], JSON_UNESCAPED_UNICODE);
            exit;


            $novo_usuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]

            ];

            $usuarios[] = $novo_usuario;

            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            break;

            //array_push($usuarios, $novo_usuario);
            //echo json_encode('Usuário inserido com sucesso!');
            //print_r($usuarios);

            break;
        
            default:
            //echo "MÉTODO NÃO ENCONTRADO!";
            //break;
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido!"], JSON_UNESCAPED_UNICODE);
            break;
    
}
    

    
?>
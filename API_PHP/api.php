<?php
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];

    //echo "Método de requisição:" .$metodo;

    switch ($metodo) {
        case 'GET':
            echo "AQUI AÇÕES DO MÉTODO GET";
            break;
        case 'POST':
            echo "AQUI AÇÕES DO MÉTODO POST";
            break;
        
        default:
            echo "MÉTODO NÃO ENCONTRADO!";
            break;
    }

    //$usuarios = [
        //["id" => 1, "nome" => "Fulano", "email" => "fulano@email"],
        //["id" => 2, "nome" => "Rayanne", "email" => "rayanne@email"]


    //];

    //echo json_encode($usuarios);

?>
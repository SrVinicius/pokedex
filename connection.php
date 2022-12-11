<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";

$banco = "pokedex";
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if (mysqli_connect_errno()) {
    trigger_error(mysqli_connect_error());
    exit();
}

mysqli_set_charset($conexao, 'utf8');

$sql = "SELECT * FROM pokemons";

$result = $conexao->query($sql);

$tmp_array = array();
while($list = $result->fetch_assoc()){
    array_push($tmp_array, $list);
}
$retorno["item"] = $tmp_array;

$json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
exit($json);
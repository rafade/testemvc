<?php

$t = "pessoa";
if(isset($_GET["t"])) {
    $t = $_GET["t"];
}

function index() {
    global $models,$t;
    $dados = $models[$t]->getAll();
    return array("t"=>$t, "dados"=>$dados);
}

function pessoa() {
    // var_dump($_GET);
    global $models,$t;
    if (isset($_POST["nome"])) {
        $models[$t]->save($_POST);
        $_SESSION["flash"] = "Salvo com sucesso.";
        header('Location: /mvc/?t='.$t);
        die('');
    }
    $dado = array();
    if (isset($_GET["id"])) {
        $dado = $models[$t]->getOne($_GET["id"]);
    }
    return array("t"=>$t, "dado"=>$dado);
}

function excluir() {
    global $models,$t;
    if (isset($_GET["id"])) {
        $models[$t]->delete($_GET["id"]);
        $_SESSION["flash"] = "Excluido com sucesso.";
        header('Location: /mvc/?t='.$t);
        die('');
    }
}
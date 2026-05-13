<?php
session_start();

function index() {
    if(isset($_SESSION['usuario'])) {
        header("Location: vistas/clientes.php");
    }
    else {
        header("Location: vistas/login.php");
    }
    exit();
}

function no_login() {
    if(isset($_SESSION['usuario'])) {
        header("Location: ../vistas/clientes.php");
        exit();
    }
}

function privado() {
    if(!isset($_SESSION['usuario'])) {
        header("Location: ../vistas/login.php");
        exit();
    }
}

function logout() {
    session_destroy();
    header("Location: ../vistas/login.php");
    exit();
}

?>
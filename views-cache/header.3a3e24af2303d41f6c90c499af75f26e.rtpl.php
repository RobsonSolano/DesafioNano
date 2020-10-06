<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard - Desafio</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1,
            user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/res/css/main.css">

</head>

<script>
    $(document).ready(function() {
        console.log("document is ready");
        $('[data-toggle="offcanvas"], #navToggle').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
        })
    });
    window.onload = function() {
        console.log("window is loaded");
    };
</script>

<body>

    <header>
        <!--Cabeçalho-->
        <nav class="navbar navbar-expand-lg fixed-top shadow navbar-dark navbar-offcanvas bg-dark">
            <a class="navbar-brand mr-auto" href="/">DASHBOARD</a>

            <button class="navbar-toggler d-block" type="button" id="navToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="logutAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Nome Adminin</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="logutAdmin">
                            <a class="dropdown-item text-white" href="/admin/perfil/">Perfil</a>
                            <a class="dropdown-item text-white" href="/admin/logout/">Sair</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/funcionarios/">Funcionários</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item nav-item-final">
                        <a class="nav-link">Developer</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--Fim do cabeçalho-->

    </header>
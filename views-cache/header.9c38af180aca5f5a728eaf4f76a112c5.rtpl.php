<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard - Desafio</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1,
            user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="/res/img/Challenge_Logo.png" type="image/x-icon">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
        <nav class="navbar bg-light navbar-expand-lg fixed-top shadow navbar-dark navbar-offcanvas">
            <a class="navbar-brand mr-auto text-dark" href="/"><strong>DASHBOARD</strong></a>

            <button class="navbar-toggler d-block border" type="button" id="navToggle">
                <i class="fas fa-bars text-dark"></i>
            </button>
            <div class="navbar-collapse offcanvas-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="logutAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong><?php echo getUserName(); ?></strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="logutAdmin">
                            <a class="dropdown-item text-white" href="/admin/perfil/"><b>Perfil</b></a>
                            <a class="dropdown-item text-white" href="/admin/logout/"><b>Sair</b></a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/funcionarios"><b>Funcionários</b></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/extracts/listagem"><b>Movimentações</b></a>
                    </li>
                    <li class="nav-item nav-item-final">
                        <a class="nav-link"><b>Developer</b></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--Fim do cabeçalho-->

    </header>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="https://i.ibb.co/xSRL0Lp/sss.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>AIDI Tech</title>
</head>

<body>
    <style>
        .nav{
            display: flex;
            flex-direction: row;
        }
        .general{
            box-shadow: rgba(0, 0, 0, 0.55) 0px 5px 15px;
            background-color: rgba(0, 0, 0, 5);
            width: 100%;
            height: 15vh;
            padding: 55px;
            position: sticky;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            text-align: center;
            margin: auto;
            top: 0;
            
        } 
        .buscador{
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: auto;
        }
        input [type="image"]{
            vertical-align: middle;
        }
        fieldset{
            padding: 0;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }
        input[type="search"]{
            width: 25vw;
            display: inline-block;
            margin: auto;
            padding: 10px;
            border-radius: 4px;
            font-size: 15px;
            border: none;
            background-color: #ddd;
        }
    </style>
 
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> -->
        <nav class="general" >
            <img src="https://i.ibb.co/3y08XGC/OTRO.png" alt="" width="300px"> 
            <div class="nav">
                <div class="buscador">
                    <form action="search.php" method="get">
                        <fieldset>
                            <input type="search" name="search" placeholder="Buscar" autocomplete="on">
                            <input type="image" src="https://i.ibb.co/VvjKh7j/icons8-search-64.png" width="25">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="item">
                        <ul class="navbar">
                            <li class="nav-item active">
                                <a class="nav-link" href="http://localhost/AIDI%20Tech.php/Tienda.php"><span>Home</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="http://localhost/AIDI%20Tech.php/mostrarCarrito.php"><img src="https://i.ibb.co/gPrpSRY/icons8-add-shopping-cart-32.png" 
                                    alt="" width="40px">(<?php
                                    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);   ?>)</a>
                            </li>
                        </ul>
                    </div>
            <style>
                body{
                    background-color: #424242;
                }
                .co{
                    color: #ADADAD;
                }
                .href{
                    background-color: #fff;
                }
                .navbar{
                    display: flex;
                    margin: auto;
                }
                .navbar a{
                    font-weight: bold;
                    color: #fff;
                }
            </style>
        </nav>
    <br> 
    <br>
    <div class="container">
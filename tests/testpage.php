<?php
session_start();

 
    echo "<h2>" . $_SESSION['id']  . "</h2>";  
    echo "<h2>" . $_SESSION['login'] . "</h2>";
    echo "<h2>" . $_SESSION['nome'] . "</h2>";
    echo "<h2>" . $_SESSION['email'] . "</h2>";
    echo "<h2>" . $_SESSION['tel'] . "</h2>";
    echo "<h2>" . $_SESSION['image'] . "</h2>";
    echo "<h2>" . $_SESSION['data_cad'] . "</h2>";
    echo "<h2>" . $_SESSION['sexo'] . "</h2>";
                        
            

    echo "<a href='exit.php'> exit </a>";
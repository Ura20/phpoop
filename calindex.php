<?php

    require("classes/Calculator.php");
    $calculator = new Calculator;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method = "post" action="">
        <input type = "number" name="num1">
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input  type = "number" name="num2">
        <button type="submit" name="save">Calulate</button>
    </form>
    <?php
    if (isset($_POST['save'])){
          
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        echo $calculator->calculate($num1,$num2,$operator);

       


       

      
    }
    ?>
    
</body>
</html>
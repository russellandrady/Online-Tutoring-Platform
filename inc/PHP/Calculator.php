<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>My Calculator</title>
</head>
<body>
   <form input action="Calculator.php" method = "post">
    Number 1:<input type="number" step="0.1" name="num1"><br>
    Operator:<input type="text" name="op"><br>
    Number 2:<input type="number" name="num2"><br>
    <input type="submit">

</form>
<?php
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$op = $_POST["op"];

if($op=="+")
{
    echo $num1 + $num2;
}
elseif($op=="-")
{
    echo $num1 - $num2;
}
elseif($op=="*")
{
    echo $num1 * $num2;
}
elseif($op=="/")
{
    echo $num1 / $num2;
}
else{
echo "Invalid Operator";
}
?>


</body>
</html>
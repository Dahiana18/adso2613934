<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main>
        <?php
        echo "<h2>Linear Programming</h2>";
        echo "<br>";
    

        $num1 = 54;
        $num2 = 32;


        echo "{$num1} * {$num2} = " . ($num1 * $num2);
        echo "<br>";

        $string = "hello";
        echo " MD5{$string} = " . md5($string);
        echo "<br>";
        echo "PASSWORD_HASH($string) = " . password_hash($string, PASSWORD_DEFAULT);
        echo "<br>";

        $hash = password_hash($string, PASSWORD_DEFAULT);

        if (password_verify($string, $hash)) {
            echo "Verified Succesful!";
        }
        echo "<h2>Structured Programming</h2>";
        echo "<br>";
        

        function adition($num1,  $num2 = 7)
        {
            return ($num1 + $num2);
        }

        $rs = adition(34, 890);
        echo "<br>" . $rs . "<br>";
        $rs = adition(89);
        echo $rs;
        echo "<br>";
        echo "<br>";

        echo "<h2>Object Oriented Programming</h2>";
        echo "<br>";
        


        class Adition
        {
            public $num1;
            public $num2;

            public function getResult()
            {
                return ($this->num1 + $this->num2);
            }
        }

        $sum = new Adition;
        $sum->num1 = 1024;
        $sum->num2 = 512;
        echo "<br>La suma de {$sum->num1} y {$sum->num2} es: " .
            $sum->getResult();
        echo "<br>";


        ?>

        <h1>Formulario</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>
                <p>Number 1:</p>
                <input type="range" name="num1" step="1" value="0" oninput="o1.value=this.value">
                <output id="o1"></output>
            </label>
            <label>
                <p>Number 2:</p>
                <input type="range" name="num2" step="1" value="0" oninput="o2.value=this.value">
                <output id="o2"></output>
            </label><br>
            <button>Calcular</button>
            <div class="resultado">
                <?php
                if ($_POST) {
                    $sum = new Adition;
                    $sum->num1 = $_POST['num1'];
                    $sum->num2 = $_POST['num2'];
                    echo "<br>La suma de {$sum->num1} y {$sum->num2} es: " .
                        $sum->getResult();
                }
                ?>
            </div>
        </form>

</body>
<main>

</html>
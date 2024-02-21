<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02-fundamentos</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            } 

            figure {
                font-size: 6rem;
            }
        }
    </style>
</head>
<body>
    <main>
       <h1>02 Fundamentals</h1>
       <section>
        <figure>
        <?php
        
        class Runner{
            //atributes
            private $name;
            private $age;
            private $number;

            //methods
            public function __construct($name, $age, $number){
                $this->name = $name;
                $this->age = $age;
                $this->number = $number;
            }
            
            public function run(){
                return "🏃‍♀️";
            }
            public function stop(){
                return "🧍‍♂️";
            }
            public function jump(){
                return "🏃‍♂️";
            }
        }
        
        $runner = new Runner('Usain Bolt', 35, 105);
        echo $runner->run();
        echo $runner->jump();
        echo $runner->stop();
        echo $runner->run();
        
        

        ?>
        </figure>
       </section>

    </main>
    
</body>
</html>
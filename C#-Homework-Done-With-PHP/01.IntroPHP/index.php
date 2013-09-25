<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Intro PHP</title>
    </head>
    <body>
        1. Print “Hello World”.<br>
        <?php
        echo 'Hello World!';
        ?>
        
        <hr>        
        2. Print your name.<br>        
        <?php
        echo 'Hello Martin!';
        ?>
        
        <hr>
        3. Print the numbers 1, 101 and 1001.<br>
        <?php
        echo '1, ';
        echo '101, ';
        echo '1001';
        ?>
        
        <hr>
        4. Print the current date and time.<br>
        <?php
        date_default_timezone_set('Africa/Nairobi');
        $date=  date('d.m.Y H:i:s');
        echo $date;        
        ?>
        
        <hr>
        5. Print the square of the number 12345.<br>
        <?php
        echo pow(12345, 2);
        ?>
        
        <hr>
        6. Print the first 10 members of the sequence: 2, -3, 4, -5, 6, -7, ...<br>
        <?php
        for ($i=2; $i<12; $i++){
            if ($i%2==0) {
                echo "$i, ";
            }
            else{
                if ($i!=11) {
                    echo "-$i, ";
                }
                else{
                    echo "-$i";
                }                
            }
        }
        ?>
        
        <hr>
        7. * Write a program to read your age from the console and print how old you will be after 10 years.<br>
        <?php
        
        ?>
    </body>
</html>

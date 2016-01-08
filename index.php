<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $test = "hello ";
        $name = "Matt";
        echo $test .'my name is ' .$name;
        
        echo "</br>";
        
        $num1 = 20;
        $num2 = 30;
        $total = $num1 - $num2;
        echo "I have " .$total ." dollars";
        
        echo "</br>";
        
        $cost = 15;
        $result;
        if($cost + 10 < 20){
            $result = "You owe me " .$cost;
        } else {
            $result = "I have all your money, all " .$cost ." of them.";
        }
        echo $result;
        
        echo "</br>";
        
        $hoursworked = $_GET['hours'];
        echo "You have worked: " .$hoursworked ." hours";
        
        echo "</br>";
        
        $position = $_GET['board'];
        $squares = str_split($position);
        
        function winner($token, $pos){
            $won = false;
            
            if(($pos[0] == $token) &&
                ($pos[1] == $token) &&
                    ($pos[2] == $token)){
                $won = true;
                
            } else if (($pos[3] == $token) &&
                        ($pos[4] == $token) &&
                            ($pos[5] == $token)){
                $won = true;
                
            } else if (($pos[6] == $token) &&
                        ($pos[7] == $token) &&
                            ($pos[8] == $token)){
                $won = true;
                
            } else if (($pos[0] == $token) &&
                        ($pos[3] == $token) &&
                            ($pos[6] == $token)){
                $won = true;
                
            }else if (($pos[1] == $token) &&
                        ($pos[4] == $token) &&
                            ($pos[7] == $token)){
                $won = true;
                
            }else if (($pos[2] == $token) &&
                        ($pos[5] == $token) &&
                            ($pos[8] == $token)){
                $won = true;
                
            }else if (($pos[0] == $token) &&
                        ($pos[4] == $token) &&
                            ($pos[8] == $token)){
                $won = true;
                
            } else if (($pos[2] == $token) &&
                        ($pos[4] == $token) &&
                            ($pos[6] == $token)){
                $won = true;
            }
            return $won;
        }
        
        if(winner('x',$squares)) echo 'X wins.';
        else if (winner('o', $squares)) echo 'Y wins.';
        else echo 'No winner yet.';
        ?>
    </body>
</html>
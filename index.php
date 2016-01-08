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
        
        function winnerElegant($token, $pos){
            for($row=0; $row<3; $row++){
                $result = true;
                for($col = 0; $col <3; $col++)
                    if($pos[3*$row+$col] != $token){
                        $result = false;
                    }
            }
            return $result;
        }

        if(winner('x',$squares)){ echo 'X wins.';
        }else if (winner('o', $squares)){ echo 'O wins.';
        }else{ echo 'No winner yet.';}
        
        echo "</br>";
        
        if(winnerElegant('x', $sqaures)){ echo 'X elegant win';
        }else if(winnerElegant('o', $squares)){ echo 'O elegant win';
        }else{ echo 'No elegant winner yet.';}
        
        class Game{
            var $pos;
            
            function __construct($squares){
                $this->pos = str_split($squares);
            }
            
            function winnerInGame($token){
                $won = false;
            
                if(($this->pos[0] == $token) &&
                    ($this->pos[1] == $token) &&
                        ($this->pos[2] == $token)){
                    $won = true;
                
                } else if (($this->pos[3] == $token) &&
                            ($this->pos[4] == $token) &&
                                ($this->pos[5] == $token)){
                    $won = true;
                
                } else if (($this->pos[6] == $token) &&
                            ($this->pos[7] == $token) &&
                              ($this->pos[8] == $token)){
                    $won = true;
                
                } else if (($this->pos[0] == $token) &&
                               ($this->pos[3] == $token) &&
                                 ($this->pos[6] == $token)){
                    $won = true;
                
                }else if (($this->pos[1] == $token) &&
                              ($this->pos[4] == $token) &&
                                  ($this->pos[7] == $token)){
                    $won = true;
                
                }else if (($this->pos[2] == $token) &&
                             ($this->pos[5] == $token) &&
                                 ($this->pos[8] == $token)){
                    $won = true;
                
                }else if (($this->pos[0] == $token) &&
                            ($this->pos[4] == $token) &&
                                ($this->pos[8] == $token)){
                    $won = true;
                
                } else if (($this->pos[2] == $token) &&
                            ($this->pos[4] == $token) &&
                                ($this->pos[6] == $token)){
                    $won = true;
                }
                return $won;
            }
        }
        
        echo "</br>";
        
        $game = new Game($position);
        if($game->winnerInGame('x')){
            echo 'X wins in game obj';
        }else if($game->winnerInGame('o')){
            echo 'O wins in game obj';
        }else {
            echo 'No winner yet in game obj';
        }
        ?>
    </body>
</html>
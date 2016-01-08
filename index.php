<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*$test = "hello ";
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
        
        echo "</br>";*/
        
        $position = $_GET['board'];
        $squares = str_split($position);
        
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
            
            function displayInGame(){
                echo '<table cols="3" style="font-size:large; font-weiht:bold">';
                echo '<tr>';
                for($pos=0; $pos<9; $pos++){
                    //echo '<td>-</td>';
                    echo $this->show_cell($pos);
                    if($pos %3 == 2) {
                        echo '</tr><tr>';
                    }
                }
                echo '</tr>';
                echo '</table>';
            }
            
            function show_cell($which){
                $token = $this->pos[$which];
                if($token <> '-'){
                    return '<td>' .$token .'</td>';
                }
                $this->newposition = $this->pos;
                $this->newposition[$which] = 'o';
                $move = implode($this->newposition);
                $link = '?board=' .$move;
                return '<td><a href="'.$link.'">-</a></td>';
            }
        }
        
        $game = new Game($position);
        if($game->winnerInGame('x')){
            echo 'X wins in game obj';
        }else if($game->winnerInGame('o')){
            echo 'O wins in game obj';
        }else {
            echo 'No winner yet in game obj';
        }
        
        $game->displayInGame();
        
        /*function display(){
            echo '<table cols="3" style="font-size:large; font-weiht:bold">';
            echo '<tr>';
            for($pos=0; $pos<9; $pos++){
                echo '<td>-</td>';
                if($pos %3 == 2) echo '</tr><tr>';
            }
            echo '</tr>';
            echo '</table>';
        }
        
        display();*/
        ?>
    </body>
</html>
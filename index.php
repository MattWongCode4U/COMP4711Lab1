<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
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
            
            function pick_move(){
                $position = rand(0,8);
               
                while($this->pos[$position] != '-'){
                    $position = rand(0,8);
                }
                $this->pos[$position] = 'x';                    
            }
            
            function check_tie(){
                $tie = true;
                for($i = 0; $i < 9; $i++){
                    if($this->pos[$i] == '-'){
                        $tie = false;
                    }
                }
                return $tie;
            }
        }
        
        $game = new Game($position);
        
        $game->pick_move();
        $game->displayInGame();
        if(!$game->winnerInGame('x') && !$game->winnerInGame('o') && !$game->check_tie()){
            echo 'No winner yet :3';
        } else if($game->winnerInGame('x')){
            echo 'X wins :P';
        } else if($game->winnerInGame('o')){
            echo 'O wins :)';
        } else if($game->check_tie()){
            echo 'tie';
        }
        
        ?>
    </body>
</html>
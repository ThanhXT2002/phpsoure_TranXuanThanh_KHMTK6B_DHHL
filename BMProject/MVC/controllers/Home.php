<?php

class Home extends Controller{
    
    // public function displayIntroduction(){
    //     echo "Đây là trang chính của trang web!";
    // }

    public function displayUser(){
        echo "welcome!";
    }

    public function displayIndex(){
        $this->view("master", [
            "Page" => "home"
        ]);
    }
    
}

?>

<?php

class ListsContr extends Lists {
    private $title;

    private $date;

    private $uid;

    public function __construct($title, $date, $uid){
        $this->title = $title;
        $this->date = $date;
        $this->uid = $uid;
    }

    public function addList(){

        if($this->emptyInput() == false){
            //echo "Empty input";
            header("location: ../lists.php?error=emptyinput");
            exit();
        }
        
        $this->setUserList($this->uid, $this->title, $this->date);
    }

    public function deleteList($id){
        
        $this->deleteUserList($id);
    }

    public function updateList($listId, $title, $date){

        $this->updateUserList($listId, $title, $date);

    }

    private function emptyInput(){
        
        if(empty($this->title) || empty($this->date)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }

}

?>
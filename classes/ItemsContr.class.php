<?php

class ItemsContr extends Items{
    private $listId;

    private $nome;

    private $valor;

    private $quantidade;

    public function __construct($listId, $nome, $valor, $quantidade){
        $this->listId = $listId;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
    }

    public function addItem(){

        if($this->emptyInput() == false){
            //echo "Empty input"
            header("location: ../items.php?error=emptyinput");
            exit();
        }
        
        $this->setUserListItems($this->listId, $this->nome, $this->valor, $this->quantidade);
    }

    public function deleteItem($id){
        
        $this->deleteUserListItem($id);
    }

    public function updateListItem($itemId, $itemName, $price, $quantity){
        $this->updateUserListItem($itemId, $itemName, $price, $quantity);
    }

    private function emptyInput(){
        
        if(empty($this->nome) || empty($this->valor) || empty($this->quantidade)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }


}
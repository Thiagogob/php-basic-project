<?php

class Items extends Dbh{
    protected function setUserListItems($listId, $nome, $valor, $quantidade){
        $stmt = $this->connect()->prepare("INSERT INTO items(list_id, item_name, quantity, price) VALUES (?, ?, ?, ?);");

        if(!$stmt->execute(array($listId, $nome, $valor, $quantidade))){
            $stmt = null;
            header("location: ../items.php?error=stmtfailed");
            exit();

        }

        $stmt = null;
    }

    protected function getUserListItems($listId){
        $stmt = $this->connect()->prepare("SELECT items.*
        FROM items
        JOIN lists ON items.list_id = lists.id
        WHERE lists.id = ?;
        
        ");

        $stmt->execute(array($listId));
        

        if($stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        else{
            return;
        }



    }

    protected function deleteUserListItem($id){
        $stmt = $this->connect()->prepare("DELETE FROM items WHERE id = ?;");

        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../items.php?error=stmtfailed");
            exit();

        }

        $stmt = null;

    }

    protected function updateUserListItem($itemId, $nome, $valor, $quantidade){
        $stmt = $this->connect()->prepare("UPDATE items SET item_name = ?, quantity = ?, price = ? WHERE id = ?");
    
        if (!$stmt->execute(array($nome, $quantidade, $valor, $itemId))) {
            $stmt = null;
            header("location: ../items.php?error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }
    
}
<?php

class Lists extends Dbh{

    protected function setUserList($uid, $title, $date){
        $stmt = $this->connect()->prepare("INSERT INTO lists(user_login, title, list_date) VALUES (?, ?, ?);");

        if(!$stmt->execute(array($uid, $title, $date))){
            $stmt = null;
            header("location: ../lists.php?error=stmtfailed");
            exit();

        }

        $stmt = null;
    }

    protected function deleteUserList($listid){
        $stmt = $this->connect()->prepare("DELETE FROM lists WHERE id = ?;");

        if(!$stmt->execute(array($listid))){
            $stmt = null;
            header("location: ../lists.php?error=stmtfailed");
            exit();

        }

        $stmt = null;

    }

    protected function updateUserList($listId, $title, $date){
        $stmt = $this->connect()->prepare("UPDATE lists SET title = ?, list_date = ? WHERE id = ?");
    
        if (!$stmt->execute(array($title, $date, $listId))) {
            $stmt = null;
            header("location: ../lists.php?error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }
    

    protected function getUserLists($uid){
        $stmt = $this->connect()->prepare("SELECT lists.*
        FROM lists
        JOIN users ON lists.user_login = users.username
        WHERE users.username = ?;
        ");

        $stmt->execute(array($uid));
        

        if($stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        else{
            return;
        }

        

    }
}

?>
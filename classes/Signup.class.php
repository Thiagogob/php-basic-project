<?php

class Signup extends Dbh{

    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users(username, pwd, email) VALUES (?, ?, ?);');
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();

        }

        $stmt = null;
    }


    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');
        
        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();

        }

        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;
    }


    public function deleteUser($uid){

        $stmt = $this->connect()->prepare('DELETE FROM users WHERE username = ?');

        if(!$stmt->execute(array($uid))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();

        }

        $stmt = null;
    }
}
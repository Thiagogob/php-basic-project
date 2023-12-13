<?php

class ListsView extends Lists
{
    public function showUserLists($uid)
    {
        $results = $this->getUserLists($uid);
        if (!empty($results)) {
            foreach ($results as $i => $data) {
?>
                
                <a href="items.php?listid=<?php echo $data['id']?>&listtitle=<?php echo $data['title']?>&listdate=<?php echo $data['list_date']?>&listuid=<?php echo $data['user_login']?>" style="text-decoration: none; color: inherit">
                    <div style="border: 2px solid red; padding: 10px; display: inline-block; margin-right: 5px;">
                        <?php
                        echo '<b>' . $data['title'] . '</b>' . '</br>';
                        echo 'Data: ' . $data['list_date'] . '</br>';
                        ?>
                        <a href="includes/deleteList.inc.php?listid=<?php echo $data['id']?>&listtitle=<?php echo $data['title']?>&listdate=<?php echo $data['list_date']?>&listuid=<?php echo $data['user_login']?>">Remover Lista</a>
                        <br>
                        <a href="lists.php?action=update&listid=<?php echo $data['id']?>&listtitle=<?php echo $data['title']?>&listdate=<?php echo $data['list_date']?>&listuid=<?php echo $data['user_login']?>">Editar Lista</a>
                    </div>
                </a>

<?php
            }
        } else {
            echo "Sem listas para mostrar";
        }
    }
}

?>

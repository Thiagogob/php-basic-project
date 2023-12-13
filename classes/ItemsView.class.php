<?php

class ItemsView extends Items
{
    public function showUserListItems($listId)
    {
        $results = $this->getUserListItems($listId);
        if (!empty($results)) {
            
                ?>

                <div style="border: 2px solid red; padding: 10px; display: inline-block; margin-right: 5px;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $i => $data){ ?>
                                <tr>

                                    <td>
                                        <?php echo $data['item_name'];?>
                                    </td>

                                    <td>
                                        <?php echo $data['price'];?>
                                    </td>

                                    <td>
                                        <?php echo $data['quantity'];?>
                                    </td>

                                    <td>
                                        <a href="includes/deleteItem.inc.php?itemid=<?php echo $data['id']?>&listtitle=<?php echo $_GET['listtitle']?>&listid=<?php echo $_GET['listid']?>">Apagar</a>
                                    </td>

                                    <td>
                                        <a href="items.php?action=update&itemid=<?php echo $data['id']?>&listtitle=<?php echo $_GET['listtitle']?>&listid=<?php echo $_GET['listid']?>&itemname=<?php echo $data['item_name']?>&itemprice=<?php echo $data['price']?>&itemquantity=<?php echo $data['quantity']?>">Editar</a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <?php
            }
         else {
            echo "Sem items para mostrar";
        }
    }
}

<?php
    require_once "includes/autoload.inc.php";
    session_start();

    $listTitle = $_GET['listtitle'];
    $listId = $_GET['listid'];

    if(isset($_GET['action']) && $_GET['action']=='update'){
        $name = $_GET['itemname'];
        $price = $_GET['itemprice'];
        $quantity = $_GET['itemquantity'];
        $itemId = $_GET['itemid'];

    }

    $formAction = isset($_GET['action']) ? "includes/updateItem.inc.php?listid=$listId&listtitle=$listTitle&itemid=$itemId" : "includes/addItem.inc.php?listid=$listId&listtitle=$listTitle";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <style>
        body {
            margin: 0; 
            padding: 0; 
        }

        .nav {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
        }

        h1 {
            top: 0;
            left: 0;
            padding: 10px;
        }

        .create-item{
            border: 2px solid green; 
            padding: 10px; 
            display: inline-block;
        }

        .items{
            border: 2px solid blue; 
            padding: 10px; 
            display: inline-block;
        }


    </style>
</head>

<body>
    <nav class="nav">
    <a href="includes/logout.inc.php">Sair</a>
    </nav>
    <nav>
        <a href="lists.php">Voltar</a>
    </nav>
    <h1>Lista: <?php echo $_GET['listtitle']?></h1>

    <div class="create-item">
    <h2>
        <?php
                if(isset($_GET['action'])){
                    echo "Atualizar item: ";
                } 
                else{
                    echo "Adicionar novo item: ";
                }
        ?>
    </h2>
        <form action=<?php echo $formAction?> method="post">
            <label>Nome: <input type="text" name="item_name" placeholder="Nome" value="<?php echo @($name)?>"></label>
            <br>
            <label>Preço: <input type="text" name="price" placeholder="Preço" value="<?php echo @($price)?>"></label>
            <br>
            <label>Quantidade: <input type="number" name="quantity" placeholder="Quantidade" value="<?php echo @($quantity)?>"></label>
            <br>
            <button type="submit" name="submit">
            <?php
                if(isset($_GET['action'])){
                    echo "Atualizar";
                } 
                else{
                    echo "Adicionar";
                }
            ?>
            </button>
        </form>
    </div>
    <br>
    <br>
    <div class="items">
    <?php
            $listItems = new ItemsView();
            $listItems->showUserListItems($_GET['listid']);
    ?>
    </div>
</body>
</html>
<?php
    require_once "includes/autoload.inc.php";
    session_start();

    if(isset($_GET['action']) && $_GET['action']=='update'){
        $date = $_GET['listdate'];
        $title = $_GET['listtitle'];
        $listId = $_GET['listid'];
    }

    $formAction = isset($_GET['action']) ? "includes/updateList.inc.php?listid=$listId" : 'includes/addList.inc.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
    <style>
        body {
            margin: 0; 
            padding: 0; 
        }

        nav {
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

        .create-list{
            border: 2px solid green; 
            padding: 10px; 
            display: inline-block;
        }

        .lists{
            border: 2px solid black; 
            padding: 10px; 

        }

    </style>
</head>
<body>
    <nav>
    <a href="includes/logout.inc.php">Sair</a>
    <br>
    <a href="includes/deleteAccount.inc.php">Excluir Conta</a>
    </nav>
    
    
    <h1>Olá, <?php echo $_SESSION['useruid']?></h1>
    
    <div class="create-list">
    <h2>
        <?php
                if(isset($_GET['action'])){
                    echo "Atualizar lista: ";
                } 
                else{
                    echo "Criar nova lista: ";
                }
        ?>
    </h2>
        <form action=<?php echo $formAction?> method="post">
            <label>Titulo: <input type="text" name="title" placeholder="Título" value="<?php echo @($title)?>"></label>
            <br>
            <label>Selecionar Data: <input type="date" name="date" value="<?php echo @($date)?>"></label>
            <br>
            <button type="submit" name="submit">
            <?php
                if(isset($_GET['action'])){
                    echo "Atualizar lista";
                } 
                else{
                    echo "Criar lista";
                }
            ?>
            </button>
        </form>
    </div>

    <div class="lists">
        <h2>Listas</h2>
        <?php
            $userLists = new ListsView();
            $userLists->showUserLists($_SESSION['useruid']);
        ?>
    </div>
</body>
</html>

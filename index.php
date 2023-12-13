<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <section>
        <div class="wrapper">
            <div class="index-login-signup">
                <h4>REGISTRAR</h4>
                <p>Ainda não tem uma conta? Crie uma agora!</p>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Nome de usuário">
                    <br>
                    <input type="password" name="pwd" placeholder="Senha">
                    <br>
                    <input type="password" name="pwdrepeat" placeholder="Repetir Senha">
                    <br>
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">REGISTRAR</button>
                </form>
            </div>

            <div class="index-login-login">
                <h4>LOGIN</h4>
                <p>Já possui uma conta? Entre aqui</p>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Nome de usuário">
                    <br>
                    <input type="password" name="pwd" placeholder="Senha">
                    <br>
                    <button type="submit" name="submit">ENTRAR</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
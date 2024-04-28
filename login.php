<?php 

session_start();

require_once './conexao.php';

if(@$_SESSION['logado']){
    header ('location: /ProjetosPHP/Login_AllStar_Sports/index.php');
}

if(!empty($_POST['login'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE `login` = '$login' ";

    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0){
        $user_data = mysqli_fetch_assoc($query);
        if(password_verify($senha, $user_data['senha'])){
            $_SESSION['logado'] = true;
            $_SESSION['user_logado'] = $user_data['id'];
            header ('location: /ProjetosPHP/Login_AllStar_Sports/index.php');
        } else {
            echo "Erro nas informações de login";
        }
    } else {
        echo "Erro nas informações de login";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AllStar Sports</title>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body{
    background: #001E5A;
    color: #00AFEF;
}

.container{
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 0 10rem;
}

.container .lado-esquerdo{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 50vw;
    height: 100vh;
}

.lado-esquerdo h1{
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-bottom: -6rem;
    margin-left: -4.5rem;
    margin-top: 10rem;
    text-transform: uppercase;
}

.container .lado-direito{
    width: 50vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-login{
    border-radius: 20px;
    width: 60%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 30px 35px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.card-login form{
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 2.5rem;

}

.card-login h3{
    font-size: 2.5rem;
    font-weight: 600;
    text-transform: uppercase;
}

.card-login label{
    font-size: 1rem;
    font-weight: 400;
}

.card-login .input{
    display: flex;
    flex-direction: column;
    align-items: start;
    gap: 0.5rem;
}

.input input{
    width: 100%;
    border: none;
    border-radius: 10px;
    padding: 10px;
    background: #00AFEF;
    font-size: 0.9rem;
    outline: none;
    color: #001E5A;
    font-weight: 400;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;
}

.botao-login input{
    padding: 0.5rem 1.2rem;
    border-radius: 10px;
    outline: none;
    border: 1px solid #00AFEF;
    background: transparent;
    color: #00AFEF;
    cursor: pointer;
    font-size: 1.1rem;
    font-weight: 600;
    transition: 0.3s all;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;
}

.botao-login input:hover{
    transform: scale(1.1);
    background: #00AFEF;
    color: #001E5A;
}

figure{
    width: 500px;
    height: 500px;
}

figure img{
    max-width: 100%;
    max-height: 100%;
    transition: 2.5s ease;
}

figure img:hover{
    opacity: 65%;
    transform: rotateY(360deg);
}

</style>

<body>
    
    <section class="container">

        <div class="lado-esquerdo">
            <h1>Realize o seu login ao lado</h1>
            <figure><img src="./Assets/logo.png" alt="Logo AllStar Sports"></figure>
        </div>

        <div class="lado-direito">
            <div class="card-login">
                <form method="post">   

                    <h3>Login</h3>

                    <div class="input">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login">
                    </div>

                    <div class="input">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha">
                    </div>

                    <div class="botao-login">
                        <input type="submit" value="Acessar">
                    </div>

                </form>
            </div>
        
        </div>
            
    </section>

</body>
</html>
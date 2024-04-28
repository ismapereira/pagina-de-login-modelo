<?php 

session_start();

if(!$_SESSION['logado']){     
    header('location: /ProjetosPHP/Login_AllStar_Sports/login.php');
}

require_once './conexao.php';

$id_user = $_SESSION['user_logado'];

$sql = "SELECT * FROM usuarios WHERE id = '$id_user' ";

$query = mysqli_query($con, $sql);

$data_user = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração | AllStar Sports</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    text-decoration: none;
    list-style-type: none;
}

body{
    background: #001E5A;
    color: #00AFEF;
}

.cabecalho{
    background: white;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;
}

.cabecalho h2{
    font-size: 1.7rem;
    font-weight: 700;
}

.navegacao-header{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
    gap: 1rem;

}

.navegacao-header a i{
    color: #001E5A;
    font-size: 1.7rem;
}

.secoes{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    justify-content: center;
    gap: 1.5rem;
    margin: 5rem 2rem;
    padding: 2.5rem;
    margin-left: 2rem;
}

.secao{
    border: 1px solid #00AFEF;
    border-radius: 0.8rem;
    height: 30vh;
    width: 20vw;
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;  
}

.cabecalho-box{
    border-bottom: 1px solid #00AFEF;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: center;
}

.cabecalho-box h2{
    display: flex;
    gap: 0.5rem;
    align-items: center;
    color: white;
    font-size: 1.2rem;
    font-weight: 600;
    padding: 0.4rem;
}

.valores-box{
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    justify-content: center;
    margin-top: 0.5rem;
}

.valores-box ul{
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.valores-box ul li a{
    color: #00AFEF;
    font-size: 1rem;
    font-weight: 400;

}

</style>

<body>
    
    <header class="cabecalho">
        <h2>Olá, <?php echo $data_user['nome']?> </h2>
        <div class="navegacao-header">
            <a href="#"><i class='bx bxs-home'></i></a>
            <a href="#"><i class='bx bxs-user'></i></a>
            <a href="./sair.php"><i class='bx bx-log-out'></i></a>
        </div>
    </header>

    <main>

        <section class="secoes">

            <div class="secao">

                <header class="cabecalho-box">
                    <h2><i class='bx bxs-user-circle'></i> Usuários</h2>
                </header>

                <main class="valores-box">
                    <ul>
                        <li><a href="#">Consulta de Usuários</a></li>
                        <li><a href="#">Cadastro de Usuários</a></li>
                        <li><a href="#">Atualização de Usuários</a></li>
                        <li><a href="#">Exclusão de Usuários</a></li>
                    </ul>
                </main>

            </div>

            <div class="secao">

                <header class="cabecalho-box">
                    <h2><i class='bx bx-list-ul'></i> Produtos</h2>
                </header>

                <main class="valores-box">
                    <ul>
                        <li><a href="#">Consulta de Produtos</a></li>
                        <li><a href="#">Cadastro de Produtos</a></li>
                        <li><a href="#">Atualização de Produtos</a></li>
                        <li><a href="#">Exclusão de Produtos</a></li>
                    </ul>
                </main>

            </div>

            <div class="secao">

                <header class="cabecalho-box">
                    <h2><i class='bx bx-user-pin'></i> Clientes</h2>
                </header>

                <main class="valores-box">
                    <ul>
                        <li><a href="#">Consulta de Clientes</a></li>
                        <li><a href="#">Cadastro de Clientes</a></li>
                        <li><a href="#">Atualização de Clientes</a></li>
                        <li><a href="#">Exclusão de Clientes</a></li>
                    </ul>
                </main>

            </div>

            <div class="secao">

                <header class="cabecalho-box">
                    <h2><i class='bx bxs-store'></i> Vendas</h2>
                </header>

                <main class="valores-box">
                    <ul>
                        <li><a href="#">Consulta de Vendas</a></li>
                        <li><a href="#">Cadastro de Vendas</a></li>
                        <li><a href="#">Atualização de Vendas</a></li>
                    </ul>
                </main>

            </div>

        </section>

    </main>

</body>
</html>
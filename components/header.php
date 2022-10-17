<nav>
    <ul class="nav-list">
        <li class="nav-item">
            <a href="index.php"><img src="public/imgs/logo.png" alt="logo playhouse" width="30px" height="30px"></a>
        </li>
        <?php

        if ($adm) {
            echo "        
            <li class='nav-item'>
                <a class= 'fundo' href='userRegister.php'>Cadastro Usuario</a>
            </li>";
            echo "        
            <li class='nav-item'>
                <a class= 'fundo' href='partyRegister.php'>Cadastro Festas</a>
            </li>";
        }
        ?>
        <li class='nav-item'>
            <a class='fundo' href='dashboard.php'>Não concluídas</a>
        </li>
        <li class='nav-item'>
            <a class='fundo' href='php/login/exit.php'>Sair</a>
        </li>

    </ul>
</nav>
<?php

// require_once '../connection.php';

$select = $mysqli->query("SELECT * FROM cardapio_festa WHERE id_festa = '$id'");

$row = $select->fetch_assoc();

$mesaBoasVindas1 = $row['mesa_boas_vindas_1'];
$mesaBoasVindas2 = $row['mesa_boas_vindas_2'];
$mesaBoasVindas3 = $row['mesa_boas_vindas_3'];

$entrada = $row['entrada'];

$bebidaExtra = $row['bebida_extra_1'];

$salgados1 = $row['salgado_1'];
$salgados2 = $row['salgado_2'];
$salgados3 = $row['salgado_3'];
$salgados4 = $row['salgado_4'];
$salgados5 = $row['salgado_5'];
$salgados6 = $row['salgado_6'];

$quantidadeSalgados1 = $row['quantidade_salgado_1'];
$quantidadeSalgados2 = $row['quantidade_salgado_2'];
$quantidadeSalgados3 = $row['quantidade_salgado_3'];
$quantidadeSalgados4 = $row['quantidade_salgado_4'];
$quantidadeSalgados5 = $row['quantidade_salgado_5'];
$quantidadeSalgados6 = $row['quantidade_salgado_6'];

$finger1 = $row['finger_1'];
$finger2 = $row['finger_2'];

$miniChurros = $row['mini_churros'];
$bolo = $row['bolo'];

$docesSimples1 = $row['doce_simples_1'];
$docesSimples2 = $row['doce_simples_2'];
$docesSimples3 = $row['doce_simples_3'];
$docesEspeciais1 = $row['doce_especial_1'];
$docesEspeciais2 = $row['doce_especial_2'];
$docesEspeciais3 = $row['doce_especial_3'];

$quantidadeSimples1 = $row['quantidade_doce_simples_1'];
$quantidadeSimples2 = $row['quantidade_doce_simples_2'];
$quantidadeSimples3 = $row['quantidade_doce_simples_3'];
$quantidadeSimples4 = $row['quantidade_doce_simples_4'];
$quantidadeEspecial1 = $row['quantidade_doce_especial_1'];
$quantidadeEspecial2 = $row['quantidade_doce_especial_2'];
$quantidadeEspecial3 = $row['quantidade_doce_especial_3'];
$quantidadeEspecial4 = $row['quantidade_doce_especial_4'];


$refrigerante = $row['refrigerante'];
$agua = $row['agua'];
$sucoLaranja = $row['suco_laranja'];
$sucoUva = $row['suco_uva'];
$chaGelado = $row['cha_gelado'];

$tipoFesta = $row['tipo_festa'];

?>

<link rel="stylesheet" href="css/cardapio.css">

<form action="php/partyDetails/updateCardapio.php?id=<?php echo $id ?>&tipo-festa=<?php echo $tipoFesta ?>" method="POST">
    <div class="container-cardapio">
        <div class="item-cardapio">
            <h3>Mesa de Boas Vindas (03 Opções)</h3>
            <div>
                <select name="opcao-1-mesa" id="opcao-1-mesa">

                    <?php
                    $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'light'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['aperitivo'];
                        if ($opcao == $mesaBoasVindas1) {
                            echo "<option value='$opcao' selected>$opcao</option>";
                            continue;
                        }
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <select name="opcao-2-mesa" id="opcao-2-mesa">
                    <?php
                    $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'light'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['aperitivo'];
                        if ($opcao == $mesaBoasVindas2) {
                            echo "<option value='$opcao' selected>$opcao</option>";
                            continue;
                        }
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <select name="opcao-3-mesa" id="opcao-3-mesa">
                    <?php
                    $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'light'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['aperitivo'];
                        if ($opcao == $mesaBoasVindas3) {
                            echo "<option value='$opcao' selected>$opcao</option>";
                            continue;
                        }
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Entrada (01 Opção)</h3>
            <select name="entrada" id="entrada">
                <?php
                $select = $mysqli->query("SELECT * FROM entrada WHERE festa = 'light'");
                while ($row = $select->fetch_assoc()) {
                    $opcao = $row['aperitivo'];
                    if($opcao == $entrada){
                        echo "<option value='$opcao' selected>$opcao</option>";  
                        continue;
                    }
                    echo "<option value='$opcao' >$opcao</option>";
                }
                ?>
            </select>
        </div>



        <div class="item-cardapio">
            <h3>Bebida Extra</h3>
            <select name="bebidas-extras" id="bebidas-extras">
                <?php
                $select = $mysqli->query("SELECT * FROM bebidas WHERE festa = 'light'");
                while ($row = $select->fetch_assoc()) {
                    $opcao = $row['bebida'];
                    if ($opcao == $bebidaExtra) {
                        echo "<option value='$opcao' selected>$opcao</option>";
                        continue;
                    }
                    echo "<option value='$opcao' >$opcao</option>";
                }
                ?>
            </select>

        </div>

        <div class="item-cardapio">
            <h3>Salgados (6 Opções | 4 Fritos e 2 Assados)</h3>
            <div class="container-salgados">
                <div>
                    <h4>Fritos</h4>
                    <div>
                        <select name="salgados-1" id="salgados-1">
                            <?php
                            $select = $mysqli->query("SELECT * FROM salgados_fritos");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['salgado'];
                                if ($opcao == $salgados1) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-salgados-1" id="quantidade-salgados-1" value="<?php echo $quantidadeSalgados1 ?>">
                    </div>
                    <div>
                        <select name="salgados-2" id="salgados-2">
                            <?php
                            $select = $mysqli->query("SELECT * FROM salgados_fritos");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['salgado'];
                                if ($opcao == $salgados2) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-salgados-2" id="quantidade-salgados-2" value="<?php echo $quantidadeSalgados2 ?>">
                    </div>
                    <div>
                        <select name="salgados-3" id="salgados-3">
                            <?php
                            $select = $mysqli->query("SELECT * FROM salgados_fritos");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['salgado'];
                                if ($opcao == $salgados3) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-salgados-3" id="quantidade-salgados-3" value="<?php echo $quantidadeSalgados3 ?>">
                    </div>
                    <div>
                        <select name="salgados-4" id="salgados-4">
                            <?php
                            $select = $mysqli->query("SELECT * FROM salgados_fritos");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['salgado'];
                                if ($opcao == $salgados4) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-salgados-4" id="quantidade-salgados-4" value="<?php echo $quantidadeSalgados4 ?>">
                    </div>
                </div>
                <div>
                    <h4>Assados</h4>

                    <div>
                        <select name="salgados-5" id="salgados-5">
                            <?php
                            $select = $mysqli->query("SELECT * FROM salgados_assados");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['salgado'];
                                if ($opcao == $salgados5) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-salgados-5" id="quantidade-salgados-5" value="<?php echo $quantidadeSalgados5 ?>">
                    </div>
                    <div>
                        <select name="salgados-6" id="salgados-6">
                            <?php
                            $select = $mysqli->query("SELECT * FROM salgados_assados");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['salgado'];
                                if ($opcao == $salgados6) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-salgados-6" id="quantidade-salgados-6" value="<?php echo $quantidadeSalgados6 ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Finger 01</h3>
            <div>
                <select name="finger-1" id="finger-1">
                    <?php
                    $select = $mysqli->query("SELECT * FROM finger WHERE festa = 'light'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['finger'];
                        if ($opcao == $finger1) {
                            echo "<option value='$opcao' selected>$opcao</option>";
                            continue;
                        }
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <label for="molho-penne">Molho: </label>
                <select name="molho-penne" id="molho-penne">
                    <?php
                    $select = $mysqli->query("SELECT * FROM molhos_penne WHERE festa = '1'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['sabor'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Finger 02</h3>
            <div>
                <select name="finger-2" id="finger-2">
                    <?php
                    $select = $mysqli->query("SELECT * FROM finger_02 WHERE festa = 'light'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['finger'];
                        if ($opcao == $finger2) {
                            echo "<option value='$opcao' selected>$opcao</option>";
                            continue;
                        }
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Sobremesas</h3>
            <div class="mini-churros">
                <span for="">Mini-Churros:</span>
                <input type="radio" name="mini-churros" id="mini-churros-sim" value="Sim" <?php if ($miniChurros == 'Sim') {
                                                                                                echo 'checked';
                                                                                            } ?>>
                <label for="mini-churros-sim">Sim</label>
                <input type="radio" name="mini-churros" id="mini-churros-nao" value="Não" <?php if ($miniChurros == 'Não') {
                                                                                                echo 'checked';
                                                                                            } ?>>
                <label for="mini-churros-nao">Não</label>
            </div>
            <div class="bolo">
                <span>Bolo: </span>
                <select name="bolo" id="bolo">
                    <?php
                    $select = $mysqli->query("SELECT * FROM bolos WHERE festa = 'week'");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['bolo'];
                        if ($opcao == $bolo) {
                            echo "<option value='$opcao' selected>$opcao</option>";
                            continue;
                        }
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
            </div>
            <h4>Doces (6 opções | 3 simples e 3 especiais)</h4>
            <div class="doces">
                <div>
                    <h5>Simples</h5>
                    <div>
                        <select name="simples-1" id="simples-1">
                            <?php
                            $select = $mysqli->query("SELECT * FROM doces");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['doce'];
                                if ($opcao == $docesSimples1) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-simples-1" id="quantidade-simples-1" value="<?php echo $quantidadeSimples1 ?>">
                    </div>
                    <div>
                        <select name="simples-2" id="simples-2">
                            <?php
                            $select = $mysqli->query("SELECT * FROM doces");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['doce'];
                                if ($opcao == $docesSimples2) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-simples-2" id="quantidade-simples-2" value="<?php echo $quantidadeSimples2 ?>">
                    </div>
                    <div>
                        <select name="simples-3" id="simples-3">
                            <?php
                            $select = $mysqli->query("SELECT * FROM doces");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['doce'];
                                if ($opcao == $docesSimples3) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-simples-3" id="quantidade-simples-3" value="<?php echo $quantidadeSimples3 ?>">
                    </div>
                </div>
                <div>
                    <h5>Especiais</h5>
                    <div>
                        <select name="especiais-1" id="especiais-1">
                            <?php
                            $select = $mysqli->query("SELECT * FROM doces_especiais");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['doce'];
                                if ($opcao == $docesEspeciais1) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-especiais-1" id="quantidade-especiais-1" value="<?php echo $quantidadeEspecial1 ?>">
                    </div>
                    <div>
                        <select name="especiais-2" id="especiais-2">
                            <?php
                            $select = $mysqli->query("SELECT * FROM doces_especiais");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['doce'];
                                if ($opcao == $docesEspeciais2) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-especiais-2" id="quantidade-especiais-2" value="<?php echo $quantidadeEspecial2 ?>">
                    </div>
                    <div>
                        <select name="especiais-3" id="especiais-3">
                            <?php
                            $select = $mysqli->query("SELECT * FROM doces_especiais");
                            while ($row = $select->fetch_assoc()) {
                                $opcao = $row['doce'];
                                if ($opcao == $docesEspeciais3) {
                                    echo "<option value='$opcao' selected>$opcao</option>";
                                    continue;
                                }
                                echo "<option value='$opcao' >$opcao</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="quantidade-especiais-3" id="quantidade-especiais-3" value="<?php echo $quantidadeEspecial3 ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Mini Lanchonete</h3>
            <div>
                <input type="checkbox" name="refrigerante" id="refrigerante" value="Refrigerante" <?php if ($refrigerante != '') {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                <label for="refrigerante">Refrigerante</label>
                <input type="checkbox" name="agua" id="agua" value="Água" <?php if ($agua != '') {
                                                                                echo 'checked';
                                                                            } ?>>
                <label for="agua">Água</label>
                <input type="checkbox" name="suco-laranja" id="suco-laranja" value="Suco de Laranja" <?php if ($sucoLaranja != '') {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                <label for="suco-laranja">Suco de Laranja</label>
                <input type="checkbox" name="suco-uva" id="suco-uva" value="Suco de Uva" <?php if ($sucoUva != '') {
                                                                                                echo 'checked';
                                                                                            } ?>>
                <label for="suco-uva">Suco de Uva</label>
                <input type="checkbox" name="cha-gelado" id="cha-gelado" value="Chá Gelado" <?php if ($chaGelado != '') {
                                                                                                echo 'checked';
                                                                                            } ?>>
                <label for="cha-gelado">Chá Gelado</label>
            </div>
        </div>

        <div class="btn-container">
            <button class="salvar-btn" name="salvar">Salvar</button>
        </div>
    </div>
</form>
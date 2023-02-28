<?php

// require_once '../connection.php';

$select = $mysqli->query("SELECT * FROM cardapio_festa WHERE id_festa = '$id'");

$row = $select->fetch_assoc();

$mesaBoasVindas1 = $row['mesa_boas_vindas_1'];
$mesaBoasVindas2 = $row['mesa_boas_vindas_2'];


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
$bolo2 = $row['bolo_2'];

$docesSimples1 = $row['doce_simples_1'];
$docesSimples2 = $row['doce_simples_2'];
$docesSimples3 = $row['doce_simples_3'];
$docesEspeciais1 = $row['doce_especial_1'];
$docesEspeciais2 = $row['doce_especial_2'];


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

//Outros

$outraMesaBoasVindas = $row['outra_mesa_boas_vindas'];
$outraBebidaExtra = $row['outra_bebida_extra'];
$outroSalgado = $row['outro_salgado'];
$finger3 = $row['finger_3'];
$outroDoce = $row['outro_doce'];
$outraEntrada = $row['outra_entrada'];

$checkboxOutraMesa = false;
$checkboxOutraBebiba = false;
$checkBoxOutroSalgado = false;
$checkboxOutroDoce = false;
$checkboxOutraEntrada = false;

if ($outraMesaBoasVindas != '') {
    $checkboxOutraMesa = true;
}

if ($outraBebidaExtra != '') {
    $checkboxOutraBebiba = true;
}

if ($outroSalgado != '') {
    $checkBoxOutroSalgado = true;
}

if ($outroDoce != '') {
    $checkboxOutroDoce = true;
}

if ($outraEntrada != '') {
    $checkboxOutraEntrada = true;
}

$tipoFesta = $row['tipo_festa'];

?>

<link rel="stylesheet" href="css/cardapio.css">

<form action="php/partyDetails/updateCardapio.php?id=<?php echo $id ?>&tipo-festa=<?php echo $tipoFesta ?>" method="POST">
    <div class="container-cardapio">
        <div class="item-cardapio">
            <h3>Mesa de Boas Vindas (02 Opções)</h3>
            <div>
                <div class="select">
                    <select name="opcao-1-mesa" id="opcao-1-mesa">
                        <?php
                        $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'week'");
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
                </div>
                <div class="select">
                    <select name="opcao-2-mesa" id="opcao-2-mesa">
                        <?php
                        $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'week'");
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
                </div>
                <div>
                    Outra Mesa de Boas Vindas?
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="outro_mesa_boas_vindas" class="outra-mesa-boas-vindas" value="Sim" <?php if($checkboxOutraMesa){echo 'checked';} ?>>
                            Sim
                        </label>
                        <label class="radio">
                            <input type="radio" name="outro_mesa_boas_vindas" class="outra-mesa-boas-vindas" value="Não" <?php if(!$checkboxOutraMesa){echo 'checked';} ?>>
                            Não
                        </label>
                    </div>
                    <input type="text" name="outra-mesa-boas-vindas" id="outra-mesa-boas-vindas" placeholder="Outra Mesa de Boas Vindas" class="input" value="<?php echo $outraMesaBoasVindas ?>">
                </div>
            </div>
        </div>



        <div class="item-cardapio">
            <h3>Bebida Extra</h3>
            <div class="select">
                <select name="bebidas-extras" id="bebidas-extras">
                    <?php
                    $select = $mysqli->query("SELECT * FROM bebidas WHERE festa = 'week'");
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
            <div>
                Outra Bebida Extra?
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="outra_bebida_extra" class="outra-bebida-extra" value="Sim" <?php if($checkboxOutraBebiba){echo 'checked';} ?>>
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="outra_bebida_extra" class="outra-bebida-extra" value="Não" <?php if(!$checkboxOutraBebiba){echo 'checked';} ?>>
                        Não
                    </label>
                </div>
                <input type="text" name="outra-bebida-extra" id="outra-bebida-extra" placeholder="Outra Bebidas Extras" class="input" value="<?php echo $outraBebidaExtra ?>">
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Salgados (6 Opções | 3 Fritos e 3 Assados)</h3>
            <div class="container-salgados">
                <div>
                    <h4>Fritos</h4>
                    <div class="is-justify-content-center is-flex is-align-items-center	">
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-salgados-1" id="quantidade-salgados-1" class="input" value="<?php echo $quantidadeSalgados1 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-salgados-2" id="quantidade-salgados-2" class="input" value="<?php echo $quantidadeSalgados2 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-salgados-3" id="quantidade-salgados-3" class="input" value="<?php echo $quantidadeSalgados3 ?>">
                    </div>
                </div>
                <div>
                    <h4>Assados</h4>
                    <div>
                        <div class="select">
                            <select name="salgados-4" id="salgados-4">
                                <?php
                                $select = $mysqli->query("SELECT * FROM salgados_assados");
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
                        </div>
                        <input type="number" name="quantidade-salgados-4" id="quantidade-salgados-4" class="input" value="<?php echo $quantidadeSalgados4 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-salgados-5" id="quantidade-salgados-5" class="input" value="<?php echo $quantidadeSalgados5 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-salgados-6" id="quantidade-salgados-6" class="input" value="<?php echo $quantidadeSalgados6 ?>">
                    </div>
                </div>
            </div>
            <div>
                Outra Opção de Salgado?
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="outro_salgado" class="outra-opcao-salgado" value="Sim" <?php if($checkBoxOutroSalgado){echo 'checked';} ?>>
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="outro_salgado" class="outra-opcao-salgado" value="Não" <?php if(!$checkBoxOutroSalgado){echo 'checked';} ?>>
                        Não
                    </label>
                </div>
                <input type="text" name="outro-salgado" id="outra-opcao-salgado" placeholder="Outra Opção Salgado" class="input" value="<?php echo $outroSalgado ?>">
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Finger 01</h3>
            <div>
                <div class="select">
                    <select name="finger-1" id="finger-1">
                        <?php
                        $select = $mysqli->query("SELECT * FROM finger WHERE festa = 'week'");
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
                </div>
                <label for="molho-penne">Molho: </label>
                <div class="select">
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
        </div>

        <div class="item-cardapio">
            <h3>Finger 02</h3>
            <div>
                <div class="select">
                    <select name="finger-2" id="finger-2">
                        <?php
                        $select = $mysqli->query("SELECT * FROM finger_02 WHERE festa = 'week'");
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
        </div>

        <div class="item-cardapio">
            <h3>Finger 03</h3>
            <div>
                <input type="text" name="finger-3" id="finger-3" class="input" placeholder="Finger 03" value="<?php echo $finger3 ?>">
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Sobremesas</h3>
            <div class="mini-churros">
                <span for="">Mini-Churros:</span>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="mini-churros" value="Sim" <?php if ($miniChurros == 'Sim') {
                                                                                echo 'checked';
                                                                            } ?>>
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="mini-churros" value="Não" <?php if ($miniChurros == 'Não') {
                                                                                echo 'checked';
                                                                            } ?>>
                        Não
                </div>
            </div>
            <div class="bolo">
                <span>Bolo: </span>
                <div class="select">
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
                <div>
                    <span>Bolo 2: </span>
                    <input type="text" name="bolo_2" id="bolo_2" class="input" placeholder="Outro bolo" value="<?php echo $bolo2 ?>">
                </div>
            </div>
            <h4>Doces (5 opções | 3 simples e 2 especiais)</h4>
            <div class="doces">
                <div>
                    <h5>Simples</h5>
                    <div>
                        <div class="select">
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
                        </div>

                        <input type="number" name="quantidade-simples-1" id="quantidade-simples-1" class="input" value="<?php echo $quantidadeSimples1 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-simples-2" id="quantidade-simples-2" class="input" value="<?php echo $quantidadeSimples2 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-simples-3" id="quantidade-simples-3" class="input" value="<?php echo $quantidadeSimples3 ?>">
                    </div>
                </div>
                <div>
                    <h5>Especiais</h5>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-especiais-1" id="quantidade-especiais-1" class="input" value="<?php echo $quantidadeEspecial1 ?>">
                    </div>
                    <div>
                        <div class="select">
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
                        </div>
                        <input type="number" name="quantidade-especiais-2" id="quantidade-especiais-2" class="input" value="<?php echo $quantidadeEspecial2 ?>">
                    </div>
                </div>
            </div>
            <div>
                Outra Opção de Doce?
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="outro_doce" class="outra-opcao-doce" value="Sim" <?php if($checkboxOutroDoce){echo 'checked';} ?>>
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="outro_doce" class="outra-opcao-doce" value="Não" <?php if(!$checkboxOutroDoce){echo 'checked';} ?>>
                        Não
                    </label>
                </div>
                <input type="text" name="outro-doce" id="outra-opcao-doce" placeholder="Outra Opção Doce" class="input" value="<?php echo $outroDoce ?>">
            </div>
        </div>

        <div class="item-cardapio">
            <h3>Mini Lanchonete</h3>
            <div>
                <label class="checkbox">
                    <input type="checkbox" name="refrigerante" value="Refrigerante" <?php if ($refrigerante != '') {
                                                                                        echo 'checked';
                                                                                    } ?>>
                    Refrigerante
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="agua" id="agua" value="Água" <?php if ($agua != '') {
                                                                                    echo 'checked';
                                                                                } ?>>
                    Água
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="suco-laranja" value="Suco de Laranja" <?php if ($sucoLaranja != '') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                    Suco de Laranja
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="suco-uva" value="Suco de Uva" <?php if ($sucoUva != '') {
                                                                                    echo 'checked';
                                                                                } ?>>
                    Suco de Uva
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="cha-gelado" value="Chá Gelado" <?php if ($chaGelado != '') {
                                                                                    echo 'checked';
                                                                                } ?>>
                    Chá Gelado
                </label>
            </div>
        </div>

        <div class="btn-container">
            <button class="salvar-btn" name="salvar">Salvar</button>
        </div>
    </div>
</form>
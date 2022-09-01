<?php

require_once '../connection.php';

?>
<div class="item-cardapio">
    <h3>Mesa de Boas Vindas (03 Opções)</h3>
    <div>
        <select name="opcao-1-mesa" id="opcao-1-mesa">
            <?php
            $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'house'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['aperitivo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
        <select name="opcao-2-mesa" id="opcao-2-mesa">
            <?php
            $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'house'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['aperitivo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
        <select name="opcao-3-mesa" id="opcao-3-mesa">
            <?php
            $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'house'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['aperitivo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
        <select name="opcao-4-mesa" id="opcao-4-mesa">
            <?php
            $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'house'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['aperitivo'];
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
        $select = $mysqli->query("SELECT * FROM entrada WHERE festa = 'house'");
        while ($row = $select->fetch_assoc()) {
            $opcao = $row['aperitivo'];
            echo "<option value='$opcao' >$opcao</option>";
        }
        ?>
    </select>
</div>

<div class="item-cardapio">
    <h3>Bebida Extra</h3>
    <select name="bebidas-extras" id="bebidas-extras">
        <?php
        $select = $mysqli->query("SELECT * FROM bebidas WHERE festa = 'house'");
        while ($row = $select->fetch_assoc()) {
            $opcao = $row['bebida'];
            echo "<option value='$opcao' >$opcao</option>";
        }
        ?>
    </select>
    <select name="bebidas-extras" id="bebidas-extras">
        <?php
        $select = $mysqli->query("SELECT * FROM bebidas WHERE festa = 'house'");
        while ($row = $select->fetch_assoc()) {
            $opcao = $row['bebida'];
            echo "<option value='$opcao' >$opcao</option>";
        }
        ?>
    </select>

</div>

<div class="item-cardapio">
    <h3>Salgados (6 Opções)</h3>
    <div class="container-salgados">
        <div>
            <div>
                <select name="salgados-1" id="salgados-1">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-1" id="quantidade-salgados-1">
            </div>
            <div>
                <select name="salgados-2" id="salgados-2">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-2" id="quantidade-salgados-2">
            </div>
            <div>
                <select name="salgados-3" id="salgados-3">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-3" id="quantidade-salgados-3">
            </div>
            <div>
                <select name="salgados-8" id="salgados-8">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-8" id="quantidade-salgados-8">
            </div>
        </div>
        <div>

            <div>
                <select name="salgados-4" id="salgados-4">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-4" id="quantidade-salgados-4">
            </div>
            <div>
                <select name="salgados-5" id="salgados-5">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-5" id="quantidade-salgados-5">
            </div>
            <div>
                <select name="salgados-6" id="salgados-6">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-6" id="quantidade-salgados-6">
            </div>
            <div>
                <select name="salgados-7" id="salgados-7">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-salgados-7" id="quantidade-salgados-7">
            </div>
        </div>
    </div>
</div>

<div class="item-cardapio">
    <h3>Finger 01</h3>
    <div>
        <select name="finger-1" id="finger-1">
            <?php
            $select = $mysqli->query("SELECT * FROM finger WHERE festa = 'house'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['finger'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
        <label for="molho-penne">Molho: </label>
        <select name="molho-penne" id="molho-penne">
            <?php
            $select = $mysqli->query("SELECT * FROM molhos_penne WHERE festa = '1' or festa='2'");
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
            $select = $mysqli->query("SELECT * FROM finger_02 WHERE festa = 'house'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['finger'];
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
        <input type="radio" name="mini-churros" id="mini-churros-sim" value="Sim">
        <label for="mini-churros-sim">Sim</label>
        <input type="radio" name="mini-churros" id="mini-churros-nao" value="Não">
        <label for="mini-churros-nao">Não</label>
    </div>
    <div class="brownie">
        <span for="">Brownie de Chocolate:</span>
        <input type="radio" name="brownie" id="brownie-sim" value="Sim">
        <label for="brownie-sim">Sim</label>
        <input type="radio" name="brownie" id="brownie-nao" value="Não">
        <label for="brownie-nao">Não</label>
    </div>
    <div class="bolo">
        <span>Bolo: </span>
        <select name="bolo" id="bolo">
            <?php
            $select = $mysqli->query("SELECT * FROM bolos");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['bolo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
    </div>
    <h4>Doces (5 opções | 3 simples e 3 especiais)</h4>
    <div class="doces">
        <div>
            <h5>Simples</h5>
            <div>
                <select name="simples-1" id="simples-1">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-simples-1" id="quantidade-simples-1">
            </div>
            <div>
                <select name="simples-2" id="simples-2">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-simples-2" id="quantidade-simples-2">
            </div>
            <div>
                <select name="simples-3" id="simples-3">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-simples-3" id="quantidade-simples-3">
            </div>
            <div>
                <select name="simples-4" id="simples-4">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-simples-4" id="quantidade-simples-4">
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
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-especiais-1" id="quantidade-especiais-1">
            </div>
            <div>
                <select name="especiais-2" id="especiais-2">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces_especiais");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-especiais-2" id="quantidade-especiais-2">
            </div>
            <div>
                <select name="especiais-3" id="especiais-3">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces_especiais");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-especiais-3" id="quantidade-especiais-3">
            </div>
            <div>
                <select name="especiais-4" id="especiais-4">
                    <?php
                    $select = $mysqli->query("SELECT * FROM doces_especiais");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['doce'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-especiais-4" id="quantidade-especiais-4">
            </div>
        </div>
    </div>
</div>

<div class="item-cardapio">
    <h3>Mini Lanchonete</h3>
    <div>
        <input type="checkbox" name="refrigerante" id="refrigerante" value="Refrigerante">
        <label for="refrigerante">Refrigerante</label>
        <input type="checkbox" name="agua" id="agua" value="Água">
        <label for="agua">Água</label>
        <input type="checkbox" name="suco-laranja" id="suco-laranja" value="Suco de Laranja">
        <label for="suco-laranja">Suco de Laranja</label>
        <input type="checkbox" name="suco-uva" id="suco-uva" value="Suco de Uva">
        <label for="suco-uva">Suco de Uva</label>
        <input type="checkbox" name="cha-gelado" id="cha-gelado" value="Chá Gelado">
        <label for="cha-gelado">Chá Gelado</label>
    </div>
</div>
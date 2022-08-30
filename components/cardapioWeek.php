<?php

require_once '../connection.php';

?>
<div class="item-cardapio">
    <h3>Mesa de Boas Vindas (02 Opções)</h3>
    <div>
        <select name="opcao-1-mesa" id="opcao-1-mesa">
            <?php
            $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'week'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['aperitivo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
        <select name="opcao-2-mesa" id="opcao-2-mesa">
            <?php
            $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'week'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['aperitivo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
    </div>
</div>

<div class="item-cardapio">
    <h3>Bebida Extra</h3>
    <select name="bebidas-extras" id="bebidas-extras">
        <?php
        $select = $mysqli->query("SELECT * FROM bebidas WHERE festa = 'week'");
        while ($row = $select->fetch_assoc()) {
            $opcao = $row['bebida'];
            echo "<option value='$opcao' >$opcao</option>";
        }
        ?>
    </select>

</div>

<div class="item-cardapio">
    <h3>Salgados (6 Opções | 3 Fritos e 3 Assados)</h3>
    <div class="container-salgados">
        <div>
            <h4>Fritos</h4>
            <div>
                <select name="fritos-1" id="fritos-1">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-fritos-1" id="quantidade-fritos-1">
            </div>
            <div>
                <select name="fritos-2" id="fritos-2">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-fritos-2" id="quantidade-fritos-2">
            </div>
            <div>
                <select name="fritos-3" id="fritos-3">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_fritos");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-fritos-3" id="quantidade-fritos-3">
            </div>
        </div>
        <div>
            <h4>Assados</h4>
            <div>
                <select name="assados-1" id="assados-1">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-assados-1" id="quantidade-assados-1">
            </div>
            <div>
                <select name="assados-2" id="assados-2">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-assados-2" id="quantidade-assados-2">
            </div>
            <div>
                <select name="assados-3" id="assados-3">
                    <?php
                    $select = $mysqli->query("SELECT * FROM salgados_assados");
                    while ($row = $select->fetch_assoc()) {
                        $opcao = $row['salgado'];
                        echo "<option value='$opcao' >$opcao</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantidade-assados-3" id="quantidade-assados-3">
            </div>
        </div>
    </div>
</div>

<div class="item-cardapio">
    <h3>Finger 01</h3>
    <div>
        <select name="finter-1" id="finger-1">
            <?php
            $select = $mysqli->query("SELECT * FROM finger WHERE festa = 'week'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['finger'];
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
        <select name="finter-2" id="finger-2">
            <?php
            $select = $mysqli->query("SELECT * FROM finger_02 WHERE festa = 'week'");
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
    <div class="bolo">
        <span>Bolo: </span>
        <select name="finter-2" id="finger-2">
            <?php
            $select = $mysqli->query("SELECT * FROM bolos WHERE festa = 'week'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['bolo'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
    </div>
    <h4>Doces (5 opções | 3 simples e 2 especiais)</h4>
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

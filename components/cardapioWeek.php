<?php

require_once '../connection.php';

?>

<div class="item-cardapio">
    <h3>Mesa de Boas Vindas (02 Opções)</h3>
    <div>
        <div class="select">
            <select name="opcao-1-mesa" id="opcao-1-mesa">
                <option value="Nenhum">Nenhum</option>
                <?php
                $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'week'");
                while ($row = $select->fetch_assoc()) {
                    $opcao = $row['aperitivo'];
                    echo "<option value='$opcao' >$opcao</option>";
                }
                ?>
            </select>
        </div>
        <div class="select">
            <select name="opcao-2-mesa" id="opcao-2-mesa">
                <option value="Nenhum">Nenhum</option>
                <?php
                $select = $mysqli->query("SELECT * FROM mesa_boas_vindas WHERE festa = 'week'");
                while ($row = $select->fetch_assoc()) {
                    $opcao = $row['aperitivo'];
                    echo "<option value='$opcao' >$opcao</option>";
                }
                ?>
            </select>
        </div>
        <div>
            Outra Mesa de Boas Vindas?
            <div class="control">
                <label class="radio">
                    <input type="radio" name="outro_mesa_boas_vindas" class="outra-mesa-boas-vindas" value="Sim">
                    Sim
                </label>
                <label class="radio">
                    <input type="radio" name="outro_mesa_boas_vindas" class="outra-mesa-boas-vindas" value="Não">
                    Não
                </label>
            </div>
            <input type="text" name="outra-mesa-boas-vindas" id="outra-mesa-boas-vindas" placeholder="Outra Mesa de Boas Vindas" class="input none">
        </div>
    </div>
</div>

<div class="item-cardapio">
    <h3>Bebida Extra</h3>
    <div class="select">
        <select name="bebidas-extras" id="bebidas-extras">
            <option value="Nenhum">Nenhum</option>
            <?php
            $select = $mysqli->query("SELECT * FROM bebidas WHERE festa = 'week'");
            while ($row = $select->fetch_assoc()) {
                $opcao = $row['bebida'];
                echo "<option value='$opcao' >$opcao</option>";
            }
            ?>
        </select>
    </div>
    <div>
        Outra Bebida Extra?
        <div class="control">
            <label class="radio">
                <input type="radio" name="outra_bebida_extra" class="outra-bebida-extra" value="Sim">
                Sim
            </label>
            <label class="radio">
                <input type="radio" name="outra_bebida_extra" class="outra-bebida-extra" value="Não">
                Não
            </label>
        </div>
        <input type="text" name="outra-bebida-extra" id="outra-bebida-extra" placeholder="Outra Bebidas Extras" class="input none">
    </div>
</div>

<div class="item-cardapio">
    <h3>Salgados (6 Opções | 3 Fritos e 3 Assados)</h3>
    <div class="container-salgados">
        <div>
            <h4>Fritos</h4>
            <div>
                <div class="select">
                    <select name="salgados-1" id="salgados-1">
                        <?php
                        $select = $mysqli->query("SELECT * FROM salgados_fritos");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['salgado'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-salgados-1" id="quantidade-salgados-1" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="salgados-2" id="salgados-2">
                        <?php
                        $select = $mysqli->query("SELECT * FROM salgados_fritos");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['salgado'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-salgados-2" id="quantidade-salgados-2" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="salgados-3" id="salgados-3">
                        <?php
                        $select = $mysqli->query("SELECT * FROM salgados_fritos");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['salgado'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-salgados-3" id="quantidade-salgados-3" class="input">
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
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-salgados-4" id="quantidade-salgados-4" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="salgados-5" id="salgados-5">
                        <?php
                        $select = $mysqli->query("SELECT * FROM salgados_assados");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['salgado'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-salgados-5" id="quantidade-salgados-5" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="salgados-6" id="salgados-6">
                        <?php
                        $select = $mysqli->query("SELECT * FROM salgados_assados");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['salgado'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-salgados-6" id="quantidade-salgados-6" class="input">
            </div>
        </div>
        <div>
            Outra Opção de Salgado?
            <div class="control">
                <label class="radio">
                    <input type="radio" name="outro_salgado" class="outra-opcao-salgado" value="Sim">
                    Sim
                </label>
                <label class="radio">
                    <input type="radio" name="outro_salgado" class="outra-opcao-salgado" value="Não">
                    Não
                </label>
            </div>
            <input type="text" name="outro-salgado" id="outra-opcao-salgado" placeholder="Outra Opção Salgado" class="input none">
        </div>
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
        <input type="text" name="finger-3" id="finger-3" class="input" placeholder="Finger 03">
    </div>
</div>

<div class="item-cardapio">
    <h3>Sobremesas</h3>
    <div class="mini-churros">
        <span for="">Mini-Churros:</span>

        <div class="control">
            <label class="radio">
                <input type="radio" name="mini-churros" value="Sim">
                Sim
            </label>
            <label class="radio">
                <input type="radio" name="mini-churros" value="Não">
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
                    echo "<option value='$opcao' >$opcao</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <span>Bolo 2: </span>
            <input type="text" name="bolo_2" id="bolo_2" class="input" placeholder="Outro bolo">
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
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-simples-1" id="quantidade-simples-1" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="simples-2" id="simples-2">
                        <?php
                        $select = $mysqli->query("SELECT * FROM doces");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['doce'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-simples-2" id="quantidade-simples-2" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="simples-3" id="simples-3">
                        <?php
                        $select = $mysqli->query("SELECT * FROM doces");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['doce'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-simples-3" id="quantidade-simples-3" class="input">
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
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-especiais-1" id="quantidade-especiais-1" class="input">
            </div>
            <div>
                <div class="select">
                    <select name="especiais-2" id="especiais-2">
                        <?php
                        $select = $mysqli->query("SELECT * FROM doces_especiais");
                        while ($row = $select->fetch_assoc()) {
                            $opcao = $row['doce'];
                            echo "<option value='$opcao' >$opcao</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="quantidade-especiais-2" id="quantidade-especiais-2" class="input">
            </div>
        </div>
    </div>
    <div>
        Outra Opção de Doce?
        <div class="control">
            <label class="radio">
                <input type="radio" name="outro_doce" class="outra-opcao-doce" value="Sim">
                Sim
            </label>
            <label class="radio">
                <input type="radio" name="outro_doce" class="outra-opcao-doce" value="Não">
                Não
            </label>
        </div>
        <input type="text" name="outro-doce" id="outra-opcao-doce" placeholder="Outra Opção Doce" class="input none">
    </div>
</div>

<div class="item-cardapio">
    <h3>Mini Lanchonete</h3>
    <div class="mini-lanchonete">
        <label class="checkbox">
            <input type="checkbox" name="refrigerante" value="Refrigerante">
            Refrigerante
        </label>
        <label class="checkbox">
            <input type="checkbox" name="agua" id="agua" value="Água">
            Água
        </label>
        <label class="checkbox">
            <input type="checkbox" name="suco-laranja" value="Suco de Laranja">
            Suco de Laranja
        </label>
        <label class="checkbox">
            <input type="checkbox" name="suco-uva" value="Suco de Uva">
            Suco de Uva
        </label>
        <label class="checkbox">
            <input type="checkbox" name="cha-gelado" value="Chá Gelado">
            Chá Gelado
        </label>
    </div>
</div>
<?php extend('template.header'); ?>
<?php extend('template.navbar'); ?>

    <div  style="padding: 15px;">
        <h2 class="text-center">Lista de Propostas</h2>
        <div>

            <?php foreach ($proposals as $key => $proposal): ?>

                <table>
                    <tr>
                        <th>Código</th>
                        <th>Registro</th>
                        <th>Plano</th>
                        <th>Qtd Beneficiários</th>
                        <th>Preço Total</th>
                    </tr>
                    <tr>
                        <td class="text-center"><?php echo '00'. $key + 1; ?></td>
                        <td class="text-center"><?php echo $proposal['plano']['registro']; ?></td>
                        <td class="text-center"><?php echo $proposal['plano']['nome']; ?></td>
                        <td class="text-center"><?php echo $proposal['plano']['qtd_beneficiarios'] . ' Beneficiários'; ?></td>
                        <td class="text-center"><?php echo 'R$ '. $proposal['plano']['preco_total'] .',00'; ?></td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-center"> <h3>Beneficiários</h3> </th>
                    </tr>
                    <tr>
                        <th colspan="3">Nomes</th>
                        <th colspan="2">Preco Beneficiario</th>
                    </tr>

                    <?php foreach ($proposal['beneficiarios'] as $key => $beneficiario): ?>
                        <tr>
                            <td colspan="3" class="text-center"><?php echo $beneficiario['nome']; ?></td>
                            <td colspan="2" class="text-center"><?php echo 'R$ '. $beneficiario['preco_beneficiario'] .',00'; ?></td>
                        </tr>
                    <?php endforeach;?>
                </table>

            <?php endforeach;?>
        </div>
    </div>
    
<?php extend('template.footer'); ?>
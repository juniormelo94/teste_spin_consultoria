<?php extend('template.header'); ?>
<?php extend('template.navbar'); ?>

    <div  style="padding: 15px;">
        <h2 class="text-center">Informações Necessárias</h2>
        <div>
            <form action="/proposals/store" method="post">
                <div class="form-row">
                    <div class="col-3">
                        <label for="">Selecionar Plano:</label>
                        <select class="form-input" name="codigo_plano" required>
                            <option value="">Selecionar Plano</option>
                            <?php foreach ($plans as $key => $value): ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-9">
                    </div>
                </div>

                <h3 class="text-center">Beneficiários</h3>

                <div id="btns">
                    <button type="button" class="btn btn-primary btns" id="add">Adicionar</button>
                    <button type="button" class="btn btn-primary btns" id="remove">Remover</button>
                </div>

                <div class="form-row">
                    <div id="col-n" class="col-1">
                        <label class="text-center" for="">Nº:</label>
                        <h2 class="form-input">1</h2>
                    </div>
                    <div id="col-nome" class="col-9">
                        <label for="">Nome Completo:</label>
                        <input class="form-input" type="text" name="nomes[]" placeholder="Nome Completo" required>
                    </div>
                    <div id="col-idade" class="col-2">
                        <label for="">Idade:</label>
                        <input class="form-input" type="number" name="idades[]" placeholder="Idade" required>
                    </div>
                </div>
                <div class="form-row">
                    <button id="btn-enviar" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    
<?php extend('template.footer'); ?>
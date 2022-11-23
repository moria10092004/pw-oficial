<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php' ?>
    <title>Nova Ordem de Serviço</title>
</head>

<body>
    <?php include_once '_parts/_header.php'; ?>
    <div class="mt-3 container" style=" margin: 0 auto;">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="formOS">
            <div class="row">
                <div class="col-md-2">
                    <label for="txtNumero" class="form-label">N° Ordem de Serviço</label>
                    <input type="text" name="txtNumero" id="txtNumero" readonly class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="txtData" class="form-label">Data</label>
                    <input type="date" name="txtData" id="txtData" value="<?php echo date('Y-m-d') ?>" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="sltCliente" class="form-label"></label>
                    <select name="sltCliente" id="sltCliente" class="form-select">
                        <?php
                        $cliente = new Cliente();
                        foreach ($cliente->listaOrdenada('nomeCliente') as $key => $row) {
                        ?>
                            <option value="<?php echo $row->idCliente ?> "><?php echo $row->nomeCliente ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOS">
                        Adicionar Serviço
                    </button>
                </div>
            </div>
            <div class="row">
                <table class="table">
                <thead>
                        <tr>
                            <th>#</th>
                            <td>Serviço</td>
                            <td>Quantidade</td>
                            <td>Valor</td>
                            <td>Total</td>
                            <td>Excluir</td>
                        </tr>
                </thead>
                <tbody id="itemOS">

                </tbody>
                </table>
            </div>
        </form>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalOS" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ordem de Seriviço</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>Serviço</th>
                <th>Valor</th>
                <th>Adicionar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $servicos = new Servico();
                foreach($servicos->listaOrdenada('nomeServico') as $key =>$row)  {
                    ?>
                    
                    <tr>
                        <td> <?php echo
                        $row->idServico ?>
                        </td>

                        <td> <?php echo
                        $row->nomeServico ?>
                        </td>

                        <td> <?php echo
                        $row->precoServico ?>
                        </td>

                        <td><button class="btn btn-primary" onclick="addServico(<?php echo$row->idServico ?>, '<?php echo $row->nomeServico ?>', <?php echo $row->precoServico ?> )">
                            <i class="bi bi-plus-circle"></i>
                            </button></td>
                    </tr>
               <?php } ?>
                 
            </tbody>
            </table>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </div>
        </div>
        </div>
        <script src="js/scripts.js"></script>
    <?php include '_parts/_linkJS.php'; ?>
</body>
</html>
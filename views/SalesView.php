<?php

class SalesView
{
    function showPrdoductSale($arreglo_product)
    {
?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - VENTAS</div>
                </div>
                <div class="mt-3">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mt-2 mf">
                                    <i class="fas fa-filter"></i>&nbsp;FILTROS DE BUSQUEDA:
                                    <input type="hidden" value="admin" id="vista" name="vista">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control form-control-lg" id="filtro" name="filtro">
                                    <option> </option>
                                    <option value="cod_producto">CODIGO PRODUCTO</option>
                                    <option value="nombre_producto">NOMBRE PRODUCTO</option>
                                    <option value="tipo_producto">TIPO PRODUCTO</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="productEnd.busquedaFiltro();">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="featurette-divider">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="#" role="button">
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('SalesController/showPrdoductSale')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CODIGO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PESO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DESCRIPCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ESTADO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                if ($arreglo_product) {
                                    $i = 0;
                                    foreach ($arreglo_product as $product) {
                                        $i++;
                                        $product_codigo = $product->cod_producto;
                                        $product_nombre = $product->nombre_producto;
                                        $product_tipo =  $product->tipo_producto;
                                        $product_peso =  $product->peso_producto;
                                        $product_precio = $product->precio;
                                        $product_des = $product->descripcion_producto;
                                        $product_estado = $product->estado;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $product_codigo; ?></td>
                                                <td class="table-info"><?php echo $product_nombre; ?></td>
                                                <td class="table-info"><?php echo $product_tipo; ?></td>
                                                <td class="table-info"><?php echo $product_peso; ?></td>
                                                <td class="table-info"><?php echo $product_precio; ?></td>
                                                <td class="table-info"><?php echo $product_des; ?></td>
                                                <td class="table-info"><?php echo $product_estado; ?></td>
                                                <td class="colr">
                                                    <i class="flaticon-cart fa-2x az" style="cursor:pointer;" title="VENDER PRODUCTO" onclick=sale.addsale(<?php print("'" . $product_codigo . "'") ?>)></i> &nbsp;
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td class="color"><?php echo $i; ?></td>
                                                <td class="color"><?php echo $product_codigo; ?></td>
                                                <td class="color"><?php echo $product_nombre; ?></td>
                                                <td class="color"><?php echo $product_tipo; ?></td>
                                                <td class="color"><?php echo $product_peso; ?></td>
                                                <td class="color"><?php echo $product_precio; ?></td>
                                                <td class="color"><?php echo $product_des; ?></td>
                                                <td class="color"><?php echo $product_estado; ?></td>
                                                <td class="colr">
                                                    <i class="flaticon-cart fa-2x az" style="cursor:pointer;" title="VENDER PRODUCTO" onclick=sale.addsale(<?php print("'" . $product_codigo . "'") ?>)></i> &nbsp;
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/Paginate.js"></script>
<?php
    }
}
?>
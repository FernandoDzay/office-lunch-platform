<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#new" data-toggle="tab">Editar Extra</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form method="POST">
                                    
                                    <input type="hidden" name="id" value="<?= $id ?>">

                                    <div class="form-group label-floating">
                                        <label class="control-label">Extra</label>
                                        <input class="form-control" type="text" name="extra" value="<?= $extra ?>">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Precio</label>
                                        <input class="form-control" type="text" name="price" value="<?= $price ?>">
                                    </div>
                                    <p class="text-center">
                                        <button name="submit_edit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Editar</button>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
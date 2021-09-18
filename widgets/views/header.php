<?php

    use App\core\Application;
    use App\core\Config;

    $data = Application::$app->HeaderFunctions->getHeaderData();

    /* echo "<pre>";
    print_r($data);
    die(); */

?>



<header>

    <!-- SideBar -->
    <section class="full-box cover dashboard-sideBar">
        <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">
            <!--SideBar Title -->
            <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                company <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <figure class="full-box">
                    <img id="avatar_img" src="<?= Config::getBaseUrl() ?><?= $data['image'] ?>" alt="UserIcon">
                    <figcaption class="text-center text-titles"><?= $data['username'] ?></figcaption>
                    <?php if($data['lunch_hour'] != false): ?>
                        <p style="margin-top: 10px;margin-bottom:-10px;">Horario: <?= substr($data['lunch_hour']['start_time'], 0, -3) ?> - <?= substr($data['lunch_hour']['end_time'], 0, -3) ?></p>
                    <?php endif; ?>
                </figure>
                <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="#!">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="btn-exit-system">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- SideBar Menu -->
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="/">
                        <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Administration <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="/insert-food-of-the-day"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Insertar comidas del día</a>
                        </li>
                        <li>
                            <a href="/insert-extras"><i class="zmdi zmdi-book zmdi-hc-fw"></i>Insertar Extras</a>
                        </li>
                        <li>
                            <a href="/groups"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Groups</a>
                        </li>
                        <li>
                            <a href="/payments"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Pagos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Users <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="admin.html"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Admin</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Pedidos <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="/todays-order"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Mis pedidos de hoy</a>
                        </li>
                        <li>
                            <a href="/my-week-orders"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Mis pedidos de la semana</a>
                        </li>
                        <li>
                            <a href="/week-orders"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Pedidos de la semana de todos</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php if( !empty($data['user_orders']) ): ?>
                <div class="side-bar-orders">
                    <p>Hoy he pedido:</p>
                    <ul>
                        <?php foreach($data['user_orders'] as $key => $order): ?>
                            <li><?= $order['quantity'] > 1 ? $order['quantity'] . ' ' : '' ?><?= $order['order_'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Modal Change image -->
    <div class="modal fade" tabindex="-1" role="dialog" id="change_image_modal">

        <div class="modal-dialog" role="document">
            <form id="change_image_form" action="/change-user-image" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cambiar foto de perfil</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Cambia la imagen (opcional)</label>
                            <div>
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image_file" name="image" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="change_image_btn" class="btn btn-primary btn-raised"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Notifications area -->
    <section class="full-box Notifications-area">
        <div class="full-box Notifications-bg btn-Notifications-area"></div>
        <div class="full-box Notifications-body">
            <div class="Notifications-body-title text-titles text-center">
                <span id="notifications_title">Sin Notificaciones</span> <i class="zmdi zmdi-close btn-Notifications-area"></i>
            </div>
            <div class="list-group" style="display:none;">
                           
            </div>

        </div>
    </section>

</header>

<!-- Content page-->
<section class="full-box dashboard-contentPage">
    <!-- NavBar -->
    <nav class="full-box dashboard-Navbar">
        <ul class="full-box list-unstyled text-right">
            <li class="pull-left">
                <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
            </li>
            <li>
                <a href="#!" class="make-order">
                    <i class="zmdi zmdi-cutlery"></i>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-Notifications-area" id="notifications_btn">
                    <i class="zmdi zmdi-notifications-none"></i>
                    <span id="notifications_number" class="badge" style="display:none;">0</span>
                </a>
            </li>
        </ul>
    </nav>
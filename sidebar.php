<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/profile-user.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $_SESSION['nomGest']; ?></div>
            <!-- <div class="profile-usertitle-name"><?php print_r($_SESSION); ?></div> -->
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Gestionnaire</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
    <?php 
        if (isset($_GET['dashboard'])){ ?>
            <li class="active">
                <a href="index.php?dashboard"><em class="fa fa-home">&nbsp;</em>
                   Accueil
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?dashboard"><em class="fa fa-home">&nbsp;</em>
                   Accueil
                </a>
            </li>
        <?php }
        if (isset($_GET['staff_mang'])){ ?>
            <li class="active">
                <a href="index.php?room_mang"><em class="fa fa-users">&nbsp;</em>
                    Chambres
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?room_mang"><em class="fa fa-users">&nbsp;</em>
                    Chambres
                </a>
            </li>
            <?php }
        if (isset($_GET['staff_mang'])){ ?>
            <li class="active">
                <a href="index.php?reservation"><em class="fa fa-users">&nbsp;</em>
                    Réservations
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?reservation"><em class="fa fa-users">&nbsp;</em>
                    Réservations
                </a>
            </li>
        <?php }
        if (isset($_GET['complain'])){ ?>
            <li class="active">
                <a href="index.php?complain"><em class="fa fa-comments">&nbsp;</em>
                    Porter une plainte
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?complain"><em class="fa fa-comments">&nbsp;</em>
                    Porter une plainte
                </a>
            </li>
        <?php }
        ?>

        <!-- <?php
        if (isset($_GET['statistics'])){ ?>
            <li class="active">
                <a href="index.php?statistics"><em class="fa fa-pie-chart">&nbsp;</em>
                    Statistiques
                </a>
            </li>
        <?php } else{?>
        <li>
            <a href="index.php?statistics"><em class="fa fa-pie-chart">&nbsp;</em>
                Statistiques
            </a>
        </li>
<?php }?> -->
        <!-- <?php
        if (isset($_GET['complain'])){ ?>
            <li class="active">
                <a href="index.php?hotelcreating"><em class="fa fa-bed">&nbsp;</em>
                    Nouvel Hôtel
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?hotelcreating"><em class="fa fa-bed">&nbsp;</em>
                    Nouvel Hôtel
                </a>
            </li>
        <?php }?> -->
        
        
    </ul>
</div><!--/.sidebar-->
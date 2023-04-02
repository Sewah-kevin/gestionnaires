<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php?hotelcreating">Retour</a></li>
            <li class="active">LISTE DES HOTELS</li>
        </ol>
    </div><!--/.row-->

   

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom Hôtel</th>
                            <th>Adresse Hôtel</th>
                            <th>Téléphone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $staff_query = "SELECT * FROM hotel";
                        $staff_result = mysqli_query($connection, $staff_query);

                        if (mysqli_num_rows($staff_result) > 0) {
                            while ($staff = mysqli_fetch_assoc($staff_result)) { ?>
                                <tr>

                                    <td><?php echo $staff['id_hotel']; ?></td>
                                    <td><?php echo $staff['name_hotel']; ?></td>
                                    <td><?php echo $staff['adress_hotel']; ?></td>
                                    <td><?php echo $staff['telephone_hotel']; ?></td>
                                </tr>


                                <?php
                            }
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">Developed By WEB TEAM</p>
        </div>
    </div>

</div>
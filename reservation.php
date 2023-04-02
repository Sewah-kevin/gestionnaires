<?php
if (isset($_GET['room_id'])){
    $get_room_id = $_GET['room_id'];
    $get_room_sql = "SELECT * FROM room NATURAL JOIN room_type WHERE room_id = '$get_room_id'";
    $get_room_result = mysqli_query($connection,$get_room_sql);
    $get_room = mysqli_fetch_assoc($get_room_result);

    $get_room_type_id = $get_room['room_type_id'];
    $get_room_type = $get_room['room_type'];
    $get_room_no = $get_room['room_no'];
    $get_room_price = $get_room['price'];
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Réservation</li>
        </ol>
    </div><!--/.row-->

    <!-- <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation</h1>
        </div>
    </div>/.row -->

    

    <div class="row">
        <div class="col-lg-12">
            <form role="form" id="booking" data-toggle="validator" autocomplete="off">
                <div class="response"></div>
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['room_id'])){?>

                        <div class="panel panel-default">
                            <div class="panel-heading">Information Chambre:
                                <a class="btn btn-secondary pull-right" href="index.php?room_mang">Reprogrammer</a>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Type de Chambre</label>
                                    <select class="form-control" id="room_type" data-error="Choisir le type de chambre" required>
                                        <option selected disabled>Choix Type de Chambre</option>
                                        <option selected value="<?php echo $get_room_type_id; ?>"><?php echo $get_room_type; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>N° Chambre</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="Choisir le No de chambre">
                                        <option selected disabled>Choix N° Chambre</option>
                                        <option selected value="<?php echo $get_room_id; ?>"><?php echo $get_room_no; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date début</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_in_date" data-error="Choisir une date début" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date fin</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_out_date" data-error="Choisir une date fin" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">Nombre de jours total : <span id="staying_day">0</span> Jour(s)</h4>
                                    <h4 style="font-weight: bold">Prix: <span id="price"><?php echo $get_room_price; ?></span> /Jour</h4>
                                    <h4 style="font-weight: bold">Montant total: <span id="total_price">0</span> /-</h4>
                                </div>
                            </div>
                        </div>
                    <?php } else{?>
                        <div class="panel panel-default">
                            <div class="panel-heading">Information Chambre:
                                <a class="btn btn-secondary pull-right" style="border-radius:0%" href="index.php?reservation">Annuler</a>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Type Chambre</label>
                                    <select class="form-control" id="room_type" onchange="fetch_room(this.value);" required data-error="Choisir le type de chambre">
                                        <option selected disabled>Choix Type Chambre</option>
                                        <?php
                                        $query  = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection,$query);
                                        if (mysqli_num_rows($result) > 0){
                                            while ($room_type = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$room_type['room_type_id'].'">'.$room_type['room_type'].'</option>';
                                            }}
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>N° Chambre</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="Choisir le No de chambre">

                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date début</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_in_date" data-error="Choisir une date début" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date fin</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_out_date" data-error="Choisir une date fin" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">Nombre de Jours Total : <span id="staying_day">0</span> Jour(s)</h4>
                                    <h4 style="font-weight: bold">Prix: <span id="price">0</span> /-</h4>
                                    <h4 style="font-weight: bold">Montant total : <span id="total_price">0</span> /-</h4>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Details Client:</div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Prénom(s)</label>
                                <input class="form-control" placeholder="Prénom(s)" id="first_name" data-error="Entrer le prénom" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Nom</label>
                                <input class="form-control" placeholder="Nom" id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Contact </label>
                                <input type="number" class="form-control" data-error="Entrer le contact" data-minlength="10" placeholder="Contact " id="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Email </label>
                                <input type="email" class="form-control" placeholder="Email" id="email" data-error="Entrer une adresse Email valide" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Type de Carte</label>
                                <select class="form-control" id="id_card_id" data-error="Choisir le type de carte" required onchange="validId(this.value);">
                                    <option selected disabled>Choix Type de Carte</option>
                                    <?php
                                    $query  = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection,$query);
                                    if (mysqli_num_rows($result) > 0){
                                        while ($id_card_type = mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$id_card_type['id_card_type_id'].'">'.$id_card_type['id_card_type'].'</option>';
                                        }}
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>N° de Carte</label>
                                <input type="text" class="form-control" placeholder="N° carte d'identité" id="id_card_no" data-error="Entrer un numéro de carte valide" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Adresse résidentielle</label>
                                <input type="text" class="form-control" placeholder="Adresse complète SVP" id="address" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success pull-right" style="border-radius:0%">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">Developpé par WEB TEAM</p>
        </div>
    </div>

</div>    <!--/.main-->


<!-- Booking Confirmation-->
<div id="bookingConfirm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><b>Réservation de chambre</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert bg-success alert-dismissable" role="alert"><em class="fa fa-lg fa-check-circle">&nbsp;</em>Chambre réservée avec succès !</div>
                        <table class="table table-striped table-bordered table-responsive">
                            <!-- <thead>
                            <tr>
                                <th>Name</th>
                                <th>Detail</th>
                            </tr>
                            </thead> -->
                            <tbody>
                            <tr>
                                <td><b>Nom Client</b></td>
                                <td id="getCustomerName"></td>
                            </tr>
                            <tr>
                                <td><b>Type de chambre</b></td>
                                <td id="getRoomType"></td>
                            </tr>
                            <tr>
                                <td><b>No de Chambre</b></td>
                                <td id="getRoomNo"></td>
                            </tr>
                            <tr>
                                <td><b>Début</b></td>
                                <td id="getCheckIn"></td>
                            </tr>
                            <tr>
                                <td><b>Fin</b></td>
                                <td id="getCheckOut"></td>
                            </tr>
                            <tr>
                                <td><b>Moment Total</b></td>
                                <td id="getTotalPrice"></td>
                            </tr>
                            <tr>
                                <td><b>Statut Payement</b></td>
                                <td id="getPaymentStaus"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" style="border-radius:60px;" href="index.php?reservation"><i class="fa fa-check-circle"></i></a>
            </div>
        </div>

    </div>
</div>



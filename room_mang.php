<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Gestion des chambres</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des chambres
                    <button class="btn btn-secondary pull-right" style="border-radius:0%" data-toggle="modal" data-target="#addRoom">Nouvelle Chambre</button>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Erreur de suppression !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Suppression effectuée avec succès !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>N° Chambre</th>
                            <th>Type Chambre</th>
                            <th>Statut Réservation</th>
                            <th>Chb Enregistrées</th>
                            <!-- <th>Vérification</th> -->
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $room_query = "SELECT * FROM room NATURAL JOIN room_type WHERE deleteStatus = 0";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $rooms['room_no'] ?></td>
                                    <td><?php echo $rooms['room_type'] ?></td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 0) {
                                            echo '<a href="index.php?reservation&room_id=' . $rooms['room_id'] . '&room_type_id=' . $rooms['room_type_id'] . '" class="btn btn-success" style="border-radius:0%">Réserver</a>';
                                        } else {
                                            echo '<a href="#" class="btn btn-danger" style="border-radius:0%">Réservée</a>';
                                        }
                                        ?>


                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0) {
                                            echo '<button class="btn btn-warning" id="checkInRoom"  data-id="' . $rooms['room_id'] . '" data-toggle="modal" style="border-radius:0%" data-target="#checkIn">visualiser</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        } else {
                                            echo '<a href="#" class="btn btn-danger" style="border-radius:0%">Enregistrée</a>';
                                            // echo '<button class="btn btn-warning" id="checkInRoom"  data-id="' . $rooms['room_id'] . '" data-toggle="modal" style="border-radius:0%" data-target="#checkIn">visualiser</button>';
                                        }
                                        ?>
                                    </td>
                                    <!-- <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 1) {
                                            echo '<button class="btn btn-primary" style="border-radius:0%" id="checkOutRoom" data-id="' . $rooms['room_id'] . '">Vérifier</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        }
                                        ?>
                                    </td> -->
                                    <td>

                                        <button title="Modifier les informations de la chambre" style="border-radius:60px;" data-toggle="modal"
                                                data-target="#editRoom" data-id="<?php echo $rooms['room_id']; ?>"
                                                id="roomEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        <?php
                                        if ($rooms['status'] == 1) {
                                            echo '<button title="Information du client" data-toggle="modal" data-target="#cutomerDetailsModal" data-id="' . $rooms['room_id'] . '" id="cutomerDetails" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>';
                                        }
                                        ?>

                                        <a title="Supprimer la chambre" href="ajax.php?delete_room=<?php echo $rooms['room_id']; ?>"
                                           class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Supprimer réellement ?')"><i
                                                    class="fa fa-trash" alt="delete" ></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "Pas de chambres";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Room Modal -->
    <div id="addRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter Nouvelle Chambre</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="addRoom" data-toggle="validator" role="form">
                                <div class="response"></div>
                                <div class="form-group">
                                    <label>Type Chambre</label>
                                    <select class="form-control" id="room_type_id" required
                                            data-error="Choisir le type de chambre">
                                        <option selected disabled>Choisir Type Chambre</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>N° Chambre</label>
                                    <input class="form-control" placeholder="N° Chambre" id="room_no"
                                           data-error="Entrer le numéro de chambre" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button class="btn btn-success pull-right">Ajouter Chambre</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Edit Room Modal -->
    <div id="editRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modifier Chambre</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="roomEditFrom" data-toggle="validator" role="form">
                                <div class="edit_response"></div>
                                <div class="form-group">
                                    <label>Type Chambre</label>
                                    <select class="form-control" id="edit_room_type" required
                                            data-error="Choisir le type de chambre">
                                        <option selected disabled>Choisir Type Chambre</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>N° Chambre</label>
                                    <input class="form-control" placeholder="N° Chambre" id="edit_room_no" required
                                           data-error="Entrer le numéro de chambre">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="edit_room_id">
                                <button class="btn btn-success pull-right">Modifier Chambre</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!---customer details-->
    <div id="cutomerDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Détails Client</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <!-- <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead> -->
                                <tbody>
                                <tr>
                                    <td><b>Nom Client</b></td>
                                    <td id="customer_name"></td>
                                </tr>
                                <tr>
                                    <td><b>Contact</b></td>
                                    <td id="customer_contact_no"></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td id="customer_email"></td>
                                </tr>
                                <tr>
                                    <td><b>Type de Carte</b></td>
                                    <td id="customer_id_card_type"></td>
                                </tr>
                                <tr>
                                    <td><b>N° Carte</b></td>
                                    <td id="customer_id_card_number"></td>
                                </tr>
                                <tr>
                                    <td><b>Adresse</b></td>
                                    <td id="customer_address"></td>
                                </tr>
                                <tr>
                                    <td><b>Montant Restant</b></td>
                                    <td id="remaining_price"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---customer details ends here-->

    <!-- Check In Modal -->
    <div id="checkIn" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Chambre-Enregistrée</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                
                                <tbody>
                                <tr>
                                    <td><b>Nom Client</b></td>
                                    <td id="getCustomerName"></td>
                                </tr>
                                <tr>
                                    <td><b>Type Chambre</b></td>
                                    <td id="getRoomType"></td>
                                </tr>
                                <tr>
                                    <td><b>N° Chambre</b></td>
                                    <td id="getRoomNo"></td>
                                </tr>
                                <tr>
                                    <td><b>Enregistrement</b></td>
                                    <td id="getCheckIn"></td>
                                </tr>
                                <tr>
                                    <td><b>Vérification</b></td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td><b>Prix total</b></td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="payment-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Paiement à l'avance</label>
                                    <input type="number" class="form-control" id="advance_payment"
                                           placeholder="Entrer le montant ici..">
                                </div>
                                <input type="hidden" id="getBookingID" value="">
                                <button type="submit" class="btn btn-primary pull-right">Paiement et enregistrement</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Check Out Modal-->
    <div id="checkOut" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Chambre - Vérification</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                
                                <tbody>
                                <tr>
                                    <td><b>Nom Client</b></td>
                                    <td id="getCustomerName_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Type Chambre</b></td>
                                    <td id="getRoomType_n"></td>
                                </tr>
                                <tr>
                                    <td><b>No Chambre</b></td>
                                    <td id="getRoomNo_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Enregistrement </b></td>
                                    <td id="getCheckIn_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Vérification</b></td>
                                    <td id="getCheckOut_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Montant Total</b></td>
                                    <td id="getTotalPrice_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Montant restant</b></td>
                                    <td id="getRemainingPrice_n"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="checkOutRoom_n" data-toggle="validator">
                                <div class="checkout-response"></div>
                                <div class="form-group col-lg-12">
                                    <label><b>Payement restant</b></label>
                                    <input type="text" class="form-control" id="remaining_amount"
                                           placeholder="payement restant" required
                                           data-error="Veuillez entrer le montant restant">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="getBookingId_n" value="">
                                <button type="submit" class="btn btn-primary pull-right">Vérifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">Developpé par WEB TEAM</p>
        </div>
    </div>

</div>    <!--/.main-->




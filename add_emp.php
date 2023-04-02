<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Ajouter un employé</li>
        </ol>
    </div><!--/.row-->

    <!-- <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Employee</h1>
        </div>
    </div> -->
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Détail Employé:</div>
                <div class="panel-body">
                    <div class="emp-response"></div>
                    <form role="form" id="addEmployee" data-toggle="validator">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Poste</label>
                                <select class="form-control" id="staff_type" required data-error="Select Staff Type">
                                    <option selected disabled>Type de poste</option>
                                    <?php
                                    $query = "SELECT * FROM staff_type";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($staff = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $staff['staff_type_id'] . '">' . $staff['staff_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Horaire</label>
                                <select class="form-control" id="shift" required data-error="Select Shift Type">
                                    <option selected disabled>Plage horaire</option>
                                    <?php
                                    $query = "SELECT * FROM shift";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($shift = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Prénom(s)</label>
                                <input type="text" class="form-control" placeholder="Prénom(s)" id="first_name" required data-error="Entrer le prénom">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Type de carte</label>
                                <select class="form-control" id="id_card_id" required onchange="validId(this.value);">
                                    <option selected disabled>Sélectionner le type de carte</option>
                                    <?php
                                    $query = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($id_card_type = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Numéro de carte</label>
                                <input type="text" class="form-control" placeholder="No de carte" id="id_card_no" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Numéro de Téléphone</label>
                                <input type="number" class="form-control" placeholder="Téléphone" id="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Adresse résidentielle</label>
                                <input type="text" class="form-control" placeholder="Adresse" id="address" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Salaire</label>
                                <input type="number" class="form-control" placeholder="Salaire" id="salaire" data-error="Entrer le salaire" required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-lg btn-success" style="border-radius:0%">Enregistrer</button>
                        <button type="reset" class="btn btn-lg btn-danger" style="border-radius:0%">Annuler</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">Developed By WEB TEAM</p>
        </div>
    </div>

</div>    <!--/.main-->





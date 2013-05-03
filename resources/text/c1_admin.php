<?php
$admin = new Adminarea();
if (isset($_COOKIE[Constans::ROLE]) && $_COOKIE[Constans::ROLE] == Constans::PAGE_ADMIN) {
    $admin->setStatus(true);
}
if (isset($_POST['sub_logaus'])) {
    $admin->CoockieAus();
    $admin->setStatus(false);
    $admin->setId(0);
}
if (isset($_POST["sub_login"])) {
    $admin->Anloggen($_POST[Constans::NAME], $_POST[Constans::PW]);
    if ($admin->getStatus() == true) {
        $admin->CoockieEin();
    }
}
if (isset($_POST["sub_update"])) {
    if ($_POST[Constans::SHOW] == 2) {
        $res = $admin->DeleteFromTable($_POST[Constans::ID], "gastbook");
        if ($res == true) {
            ?>
            <div class="alert alert-success alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                Kommentar (id: <?php echo $_POST[Constans::ID] ?>) wurde erfoglgreich gel&ouml;scht. 
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-error alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                <strong>Error!</strong> Kommentar (id: <?php echo $_POST[Constans::ID] ?>) wurde nicht gel&ouml;scht. Es wurde eine Fehlermeldung aufgetretten!
            </div>
            <?php
        }
    } else {
        $res = $admin->UpdateInGastBook($_POST[Constans::ID], $model->Umlaute($_POST[Constans::NAME]), $_POST[Constans::EMAIL], $model->Umlaute($_POST[Constans::NACHRICHT]), $model->Umlaute($_POST[Constans::ADMIN_ANTWORT]), $_POST[Constans::SHOW]);
        if ($res == TRUE) {
            ?>
            <div class="alert alert-success alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                Erfolgreich!
            </div>
            <?php
        }
    }

    // $_POST[Constans::ID];
}

if ($admin->getStatus() == false) {
    if (!isset($_POST["sub_login"])) {
        ?>
        <div class="article_text c1" id="text_login">
            <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">

                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    <input placeholder="admin-name" autofocus required type="text" id="id_<?php echo Constans::NAME ?>" name="<?php echo Constans::NAME ?>">
                </div>
                <div class="leerzeile"></div>
                <div class="input-prepend"><span class="add-on"><i class="icon-asterisk"></i></span>
                    <input placeholder="passwort" required type="password" id="id_<?php echo Constans::PW ?>" name="<?php echo Constans::PW ?>">
                </div>
                <div class="leerzeile"></div>
                <button type="submit" class="btn btn-success leerzeichen" name="sub_login">
                    <i class="icon-white icon-check"></i> anloggen
                </button>
            </form>
        </div>
        <?php
    }
} else {
    ?>
    <div class="article_text c1" id="text_alles_gast">
        <?php
        $result = $admin->GetAllFromGastBook();
        if ($result != 0) {
            foreach ($result as $value) {
                ?>
        <div class="schow_<?php echo $value[Constans::SHOW]?>">
                <fieldset id="set_<?php echo $value[Constans::ID]; ?>">
                    <legend><?php echo "Kommentar id: " . $value[Constans::ID] ?></legend>
                    <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                            <input required style="width: 180px;" value="<?php echo $value[Constans::NAME] ?>" required type="text" name="<?php echo Constans::NAME ?>">
                        </div>


                        <div class="input-prepend  right" ><span class="add-on"><i class="icon-envelope"></i></span>
                            <input style="width: 180px;" value="<?php echo $value[Constans::EMAIL] ?>" type="text" name="<?php echo Constans::EMAIL ?>">            
                        </div>
                        <div class="leerzeile"></div>

                        <label><?php echo Constans::NACHRICHT ?>:</label>
                        <textarea required rows="6" class="input-xlarge-area norezise" name="<?php echo Constans::NACHRICHT ?>"><?php echo $value[Constans::NACHRICHT] ?></textarea>
                        <div class="leerzeile"></div>

                        <label><?php echo Constans::ANTWORT ?>:</label>
                        <textarea rows="3" class="input-xlarge-area norezise" name="<?php echo Constans::ADMIN_ANTWORT ?>"><?php echo $value[Constans::ADMIN_ANTWORT] ?></textarea>


                        <input type="hidden" value="<?php echo $value[Constans::ID] ?>" name="<?php echo Constans::ID ?>">
                        <div class="leerzeile"></div>
                        <?php
                        $color = "gray";
                        if ($value[Constans::SHOW] == 0) {
                            $color = "lightcoral";
                        } elseif ($value[Constans::SHOW] = 1) {
                            $color = "green";
                        }
                        ?>
                        <select name="<?php echo Constans::SHOW ?>" style="width: 210px; border: <?php echo $color ?> solid 1px">
                            <?php
                            foreach ($admin->getAction() as $key => $action) {
                                if ($value[Constans::SHOW] == 0 && $action == "nopublic") {
                                    echo "<option value='" . $key . "' selected>" . $action . "</option>";
                                } else {
                                    echo "<option value='" . $key . "'>" . $action . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <button type="submit" style="margin-bottom: 20px" class="btn btn-success right leerzeichen right" name="sub_update">
                            <i class="icon-white icon-check"></i> OK
                        </button>

                    </form>
                </fieldset>
            </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
}?>
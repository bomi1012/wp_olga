<?php
// sehe header_oben
//$admin = new Adminarea();
/**
 * Если нажата кнопка Abmelden
 */
if (isset($_POST['sub_logaus'])) {
    $admin->CoockieAus();
    $admin->setStatus(false);
    $admin->setId(0);
}
/**
 * Если нажата кнопка Anmelden
 */
if (isset($_POST["sub_login"])) {
    $admin->Anloggen($_POST[Constans::NAME], $_POST[Constans::PW]);
    if ($admin->getStatus() == true) {
        $admin->CoockieEin();
    }
}
/**
 * Update
 */
if (isset($_POST["sub_update"])) {
    /**
     * Удаление элемента
     * @see Adminarea.php: array(1 => "public", 0 => "nopublic", 2 => "delete");
     */
    if ($_POST[Constans::SHOW] == 2) {
        $res = $admin->DeleteFromTable($_POST[Constans::ID], "gastbook");
        if ($res == true) { // уделение прошло на УРА!!
            ?>
            <div class="alert alert-success alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                Kommentar (id: <?php echo $_POST[Constans::ID] ?>) wurde erfoglgreich gel&ouml;scht. 
            </div>
            <?php
        } else {// уделение прошло на как-то не так!!
            ?>
            <div class="alert alert-error alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                <strong>Fehlermeldung:</strong> Kommentar (id: <?php echo $_POST[Constans::ID] ?>) wurde nicht gel&ouml;scht. Es wurde eine Fehlermeldung aufgetretten!
            </div>
            <?php
        }
    } else { // Если не удаление, то update. 
        $res = $admin->UpdateInGastBook($_POST[Constans::ID], $model->Umlaute($_POST[Constans::NAME]), $_POST[Constans::EMAIL], $model->Umlaute($_POST[Constans::NACHRICHT]), $model->Umlaute($_POST[Constans::ADMIN_ANTWORT]), $_POST[Constans::SHOW]);
        if ($res == TRUE) { // Update прошел на УРА!!
            ?>
            <div class="alert alert-success alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                Erfolgreich!
            </div>
            <?php
        } else { // что-то пошло не так
            ?>
            <div class="alert alert-error alert-oben-big">
                <a href="#" class="close right" data-dismiss="alert">&times;</a>
                Es wurde eine Fehlermeldung aufgetretten!
            </div>
            <?php
        }
    }
}

/**
 * Если Это не Админ
 */
if ($admin->getStatus() == false) {
    /**
     * Если не нажата кнопка войти как Админ - дать форму для входа
     */
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
                    <i class="icon-white icon-check"></i> anmelden
                </button>
            </form>
        </div>
        <?php
    }
}
/**
 * Если это Админ
 */ else {
    ?>
    <div class="article_text c1" id="text_alles_gast">
        <?php
        $result = $admin->GetAllFromGastBook(); // Все из Гостевой книги
        if ($result != 0) { // если что-то нашел - то очень хорошо!
            foreach ($result as $value) { // читаем и выводим на экран
                ?>
                <div class="schow_<?php echo $value->getShow() ?>">
                    <fieldset id="set_<?php echo $value->getId() ?>">
                        <legend><?php echo "Kommentar id: " .  $value->getId() ?></legend>
                        <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">
                            <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                                <input required style="width: 180px;" value="<?php echo $value->getName()?>" required type="text" 
                                       name="<?php echo Constans::NAME ?>">
                            </div>


                            <div class="input-prepend  right" ><span class="add-on"><i class="icon-envelope"></i></span>
                                <input style="width: 180px;" value="<?php echo $value->getEmail() ?>" type="text" 
                                       name="<?php echo Constans::EMAIL ?>">            
                            </div>
                            <div class="leerzeile"></div>

                            <label><?php echo Constans::NACHRICHT ?>:</label>
                            <textarea required rows="6" class="input-xlarge-area norezise" name="<?php echo Constans::NACHRICHT ?>"><?php echo $value->getMessage() ?></textarea>
                            <div class="leerzeile"></div>

                            <label><?php echo Constans::ANTWORT ?>:</label>
                            <textarea rows="3" class="input-xlarge-area norezise" name="<?php echo Constans::ADMIN_ANTWORT ?>"><?php echo $value->getAdminAntwort() ?></textarea>


                            <input type="hidden" value="<?php echo $value->getId() ?>" name="<?php echo Constans::ID ?>">
                            <div class="leerzeile"></div>
                            <?php
                            $color = "gray";
                            if ($value->getShow() == 0) {
                                $color = "lightcoral";
                            } elseif ($value->getShow() == 1) {
                                $color = "green";
                            }
                            ?>
                            <select name="<?php echo Constans::SHOW ?>" style="width: 210px; border: <?php echo $color ?> solid 1px">
                                <?php
                                foreach ($admin->getAction() as $key => $action) {
                                    if ($value->getShow() == 0 && $action == "nopublic") {
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

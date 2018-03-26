<div class="article_text c1" id="angebot-form">
    <form class="form-horizontal" action='' method="POST" accept-charset="utf-8">
        <div style="margin-top: -20px;">
            <h2 class="title_contact">Daten des Kinds</h2>
        </div>
        <label>Vorname*:</label>
        <div class="input-prepend">
            <input required type="text" id="id_kid_firstname" name="kid_firstname" style="width:270px;">
        </div>
        <div class="leerzeile_min"></div>
        <label>Nachname*:</label>
        <div class="input-prepend">
            <input required type="text" id="id_kid_lastname" name="kid_lastname" style="width:270px;">
        </div>  
        <div class="leerzeile_min"></div>
        <label>Wird geboren:</label>
        <div class="input-prepend">
            <select name="kid_mm" id="id_kid_mm" style="width: 200px;">
                <option value="empty" selected></option>
                <option value="Januar">Januar</option>
                <option value="Februar">Februar</option>
                <option value="Marz"><?php echo $model->Umlaute("März"); ?></option>
                <option value="April">April</option>
                <option value="Mai">Mai</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Dezember">Dezember</option>
            </select>
            <input type="number" id="id_kid_yy" name="kid_yy" style="width:55px; margin-left: 4px;" min="<?php echo date("Y") - 5; ?>" max="<?php echo date("Y") + 3; ?>">
        </div>  
        <div class="leerzeile_min"></div>
        <label>Geschlecht*</label>
        <div class="form-check">
            <input type="radio" name="kid_g" value="w" style="margin-top: 9px;" checked /> <span class="sublabel"><?php echo $model->Umlaute("Mädchen"); ?></span>
            <input type="radio" name="kid_g" value="m" style="margin-left: 25px; margin-top: 9px;" /> <span class="sublabel"><?php echo $model->Umlaute("Junge"); ?></span>
        </div>
        <div class="leerzeile"></div>


        <div>
            <h2 class="title_contact">Daten des Elterns</h2>
        </div>
        <label>Vater*:</label>
        <div class="input-prepend">
            <input placeholder="Name, Vorname" required type="text" id="id_vather" name="father" style="width:270px;"><br/>
            <div class="leerzeile_min"></div>
            <input placeholder="Beruf" type="text" id="id_vather_work" name="father_work" style="width:270px;">
        </div>
        <div class="leerzeile"></div>
        <label>Mutter*:</label>
        <div class="input-prepend">
            <input placeholder="Name, Vorname" required type="text" id="id_mother" name="mother" style="width:270px;"><br/>
            <div class="leerzeile_min"></div>
            <input placeholder="Beruf" type="text" id="id_mother_work" name="mother_work" style="width:270px;">
        </div>  
        <div class="leerzeile"></div>
        <label>Telefonnummer:</label>
        <div class="input-prepend">
            <input type="tel" id="id_tel" name="parent_tel" style="width:270px;"><br/>
        </div>  
        <div class="leerzeile_min"></div>
        <label>Email*:</label>
        <div class="input-prepend">
            <input required type="email" id="id_email" name="parent_email" style="width:270px;">
        </div>  
        <div class="leerzeile"></div>


        <div>
            <h2 class="title_contact"><?php echo $model->Umlaute("Monat der Aufnahme und Beendigung"); ?></h2>
        </div>
        <label>Aufnahme:</label>
        <div class="input-prepend">
            <select name="start" id="id_start" style="width: 200px;">
                <option value="empty" selected></option>
                <option value="Januar">Januar</option>
                <option value="Februar">Februar</option>
                <option value="Marz"><?php echo $model->Umlaute("März"); ?></option>
                <option value="April">April</option>
                <option value="Mai">Mai</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Dezember">Dezember</option>
            </select>
            <input type="number" id="id_start_yy" name="start_yy" style="width:55px; margin-left: 4px;" min="<?php echo date("Y") - 1; ?>" max="<?php echo date("Y") + 6; ?>">
        </div>
        <div class="leerzeile"></div>

        <label>Beendigung:</label>
        <div class="input-prepend">
            <select name="end" id="id_end" style="width: 200px;">
                <option value="empty" selected></option>
                <option value="Januar">Januar</option>
                <option value="Februar">Februar</option>
                <option value="Marz"><?php echo $model->Umlaute("März"); ?></option>
                <option value="April">April</option>
                <option value="Mai">Mai</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Dezember">Dezember</option>
            </select>
            <input type="number" id="id_end_yy" name="end_yy" style="width:55px; margin-left: 4px;" min="<?php echo date("Y") - 1; ?>" max="<?php echo date("Y") + 6; ?>">
        </div>  
        <div class="leerzeile"></div>

        <div>
            <h2 class="title_contact"><?php echo $model->Umlaute("Benötigte Öffnungszeiten"); ?></h2>
        </div>

        <label><?php echo $model->Umlaute("Öffnungzeit*:"); ?></label>
        <div class="input-prepend">
            <select required name="time" id="id_time" style="width: 200px;">
                <option value="Ganzagstplatz">Ganztagstplatz</option>
                <option value="Teilzeitplatz">Teilzeitplatz</option>
            </select>
        </div>
        <div class="leerzeile"></div>
        <div class="input-prepend" style="font-size: 100%">
            <label class="form-check-label" for="check-mon">
                Montag
            </label>   
            <input class="form-check-input" type="checkbox" name="check_mon" value="mon" id="check-mon" />
            <div id="root_mon" style="display: inline; visibility: hidden;" >
                <span class="sublabel">von  </span>
                <input type="number" name="from_mon" id="from-mon" style="width:40px;" min="7" max="12"/>
                <span class="sublabel">bis  </span>
                <input type="number" name="to_mon" id="to-mon" style="width:40px;" min="11" max="17" />
                <span id="full_mon" class="navi a sublabel">ganzer Tag</span>
            </div>

        </div>
        <div class="leerzeile"></div>        
        <div class="input-prepend" style="font-size: 100%">
            <label class="form-check-label" for="check-tue">
                Dienstag
            </label>  
            <input class="form-check-input" type="checkbox" name="check_tue" value="tue" id="check-tue" />
            <div id="root_tue" style="display: inline; visibility: hidden;" >
                <span class="sublabel">von  </span>
                <input type="number" name="from_tue" id="from-tue" style="width:40px; "  min="7" max="12"/>
                <span class="sublabel">bis  </span>
                <input type="number" name="to_tue" id="to-tue" style="width:40px;" min="11" max="17" />
                <span id="full_tue" class="navi a sublabel">ganzer Tag</span>
            </div>

        </div>
        <div class="leerzeile"></div>
        <div class="input-prepend" style="font-size: 100%">
            <label class="form-check-label" for="check-wed">
                Mittwoch
            </label>  
            <input class="form-check-input" type="checkbox" name="check_wed" value="wed" id="check-wed" />
            <div id="root_wed" style="display: inline; visibility: hidden;" >
                <span class="sublabel">von  </span>
                <input type="number" name="from_wed" id="from-wed" style="width:40px; "  min="7" max="12"/>
                <span class="sublabel">bis  </span>
                <input type="number" name="to_wed" id="to-wed" style="width:40px; " min="11" max="17"/>
                <span id="full_wed" class="navi a sublabel">ganzer Tag</span>
            </div>

        </div>
        <div class="leerzeile"></div>
        <div class="input-prepend" style="font-size: 100%">
            <label class="form-check-label" for="check-thu">
                Donnerstag
            </label> 
            <input class="form-check-input" type="checkbox" name="check_thu" value="thu" id="check-thu" />
            <div id="root_thu" style="display: inline; visibility: hidden;" >
                <span class="sublabel">von  </span>
                <input type="number" name="from_thu" id="from-thu" style="width:40px; "  min="7" max="12"/>
                <span class="sublabel">bis  </span>
                <input type="number" name="to_thu" id="to-thu" style="width:40px; " min="11" max="17"/>
                <span id="full_thu" class="navi a sublabel">ganzer Tag</span>
            </div>         
        </div>
        <div class="leerzeile"></div>
        <div class="input-prepend" style="font-size: 100%">
            <label class="form-check-label" for="check-fri">
                Freitag
            </label>   
            <input class="form-check-input" type="checkbox" name="check_fri" value="fri" id="check-fri" />
            <div id="root_fri" style="display: inline; visibility: hidden;" >
                <span class="sublabel">von  </span>
                <input type="number" name="from_fri" id="from-fri" style="width:40px; "  min="7" max="12"/>
                <span class="sublabel">bis  </span>
                <input type="number" name="to_fri" id="to-fri" style="width:40px; " min="11" max="17"/>
                <span id="full_fri" class="navi a sublabel">ganzer Tag</span>
            </div>       
        </div>
        <div class="leerzeile"></div>

        <div>
            <h2 class="title_contact"><?php echo $model->Umlaute("Zusätzliche Information"); ?></h2>
        </div>
        <label></label>
        <div class="input-prepend">
            <textarea name="additional_message" rows="7" class="input-large-area norezise"></textarea>
        </div>
        <div class="leerzeile"></div>
        <label> 
            <acronym title="Damit wir sicher sein, dass Sie ein Mensch sind, bitte geben Sie den Code aus dem Bild.">
                <?php echo $zahl_von_date . ' plus I0 = *'; ?> 
            </acronym>
        </label>
        <div class="input-prepend"><span class="add-on"><i class="icon-question"></i></span>
            <input required type="text" id="id_frage" name="frage">
        </div>  

        <div class="leerzeile"></div>
        <button type="submit" class="btn btn-success right leerzeichen" name="submit_form">
            <i class="icon-white icon-check"></i> Nachricht senden
        </button>
    </form>
</div>
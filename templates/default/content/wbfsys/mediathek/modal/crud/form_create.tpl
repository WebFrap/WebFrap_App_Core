  <div id="wgt-tab-form-wbfsys_mediathek-create" class="wcm wcm_ui_tab" >
    <div class="wgt_tab_body" >

    <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
    <form
      method="post"
      accept-charset="utf-8"
      class="<?php echo $VAR->formClass?>"
      id="<?php echo $VAR->formId?>"
      action="<?php echo $VAR->formAction?>" ></form>

      <!-- Tab Details -->
      <div  
        id="<?php echo $this->id?>_tab_wbfsys_mediathek_details"
        title="<?php echo $I18N->l('Mediathek','wbfsys.mediathek.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mediathek-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_mediathek-default" >
          <?php echo $ELEMENT->inputWbfsysMediathekVid;?>

          <?php echo $ELEMENT->inputWbfsysMediathekIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMediathekName;?>
          <?php echo $ELEMENT->inputWbfsysMediathekFlagSystem;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMediathekIdLicence;?>
          <?php echo $ELEMENT->inputWbfsysMediathekAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mediathek-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_mediathek-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMediathekDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_mediathek-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_mediathek-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMediathekMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMediathekMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMediathekRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMediathekMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMediathekMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMediathekMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMediathekMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

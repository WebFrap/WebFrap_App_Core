  <div id="wgt-tab-form-core_location-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_location_details"
        title="<?php echo $I18N->l('location','core.location.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_location-cord').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Coordinates
        </legend>
        <div id="wgt-box-core_location-cord" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreLocationMapsLink;?>
          <?php echo $ELEMENT->inputCoreLocationXCord;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreLocationZCord;?>
          <?php echo $ELEMENT->inputCoreLocationYCord;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_location-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_location-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreLocationMRoleChange;?>
          <?php echo $ELEMENT->inputCoreLocationMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreLocationRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreLocationMUuid;?>
          <?php echo $ELEMENT->inputCoreLocationMVersion;?>
          <?php echo $ELEMENT->inputCoreLocationMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreLocationMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

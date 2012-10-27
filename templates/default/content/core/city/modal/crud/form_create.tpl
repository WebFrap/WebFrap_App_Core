  <div id="wgt-tab-form-core_city-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_city_details"
        title="<?php echo $I18N->l('City','core.city.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_city-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_city-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCityName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCityIdCountry;?>
          <?php echo $ELEMENT->inputCoreCityPostalcode;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_city-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_city-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCityMRoleChange;?>
          <?php echo $ELEMENT->inputCoreCityMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreCityRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCityMUuid;?>
          <?php echo $ELEMENT->inputCoreCityMVersion;?>
          <?php echo $ELEMENT->inputCoreCityMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreCityMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

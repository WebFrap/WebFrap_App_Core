  <div id="wgt-tab-form-core_country-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_country_details"
        title="<?php echo $I18N->l('Country','core.country.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_country-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_country-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCountryName;?>
          <?php echo $ELEMENT->inputCoreCountryIdCurrency;?>
          <?php echo $ELEMENT->inputCoreCountryIdMainlanguage;?>
          <?php echo $ELEMENT->inputCoreCountryFlag;?>
          <?php echo $ELEMENT->inputCoreCountryCountryNumber;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCountryKey3;?>
          <?php echo $ELEMENT->inputCoreCountryAccessKey;?>
          <?php echo $ELEMENT->inputCoreCountryIdCategory;?>
          <?php echo $ELEMENT->inputCoreCountryKredRevenue;?>
          <?php echo $ELEMENT->inputCoreCountryDebRevenue;?>
          <?php echo $ELEMENT->inputCoreCountryShort;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_country-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_country-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCountryMRoleChange;?>
          <?php echo $ELEMENT->inputCoreCountryMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreCountryRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCountryMUuid;?>
          <?php echo $ELEMENT->inputCoreCountryMVersion;?>
          <?php echo $ELEMENT->inputCoreCountryMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreCountryMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

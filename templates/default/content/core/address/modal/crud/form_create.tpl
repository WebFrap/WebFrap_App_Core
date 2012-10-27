  <div id="wgt-tab-form-core_address-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_address_details"
        title="<?php echo $I18N->l('Address','core.address.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_address-address').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Address
        </legend>
        <div id="wgt-box-core_address-address" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreAddressIdCountry;?>
          <?php echo $ELEMENT->inputCoreAddressPostbox;?>
          <?php echo $ELEMENT->inputCoreAddressStreet;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreAddressIdLocation;?>
          <?php echo $ELEMENT->inputCoreAddressCity;?>
          <?php echo $ELEMENT->inputCoreAddressPostalcode;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreAddressDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_address-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_address-default" >
          <?php echo $ELEMENT->inputCoreAddressVid;?>

          <?php echo $ELEMENT->inputCoreAddressIdVidEntity;?>

        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_address-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_address-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreAddressMRoleChange;?>
          <?php echo $ELEMENT->inputCoreAddressMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreAddressRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreAddressMUuid;?>
          <?php echo $ELEMENT->inputCoreAddressMVersion;?>
          <?php echo $ELEMENT->inputCoreAddressMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreAddressMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

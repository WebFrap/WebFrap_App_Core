  <div id="wgt-tab-form-core_currency-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_currency_details"
        title="<?php echo $I18N->l('Currency','core.currency.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_currency-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_currency-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCurrencyName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCurrencyAccessKey;?>
          <?php echo $ELEMENT->inputCoreCurrencySymbol;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_currency-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-core_currency-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreCurrencyDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_currency-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_currency-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCurrencyMRoleChange;?>
          <?php echo $ELEMENT->inputCoreCurrencyMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreCurrencyRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCurrencyMUuid;?>
          <?php echo $ELEMENT->inputCoreCurrencyMVersion;?>
          <?php echo $ELEMENT->inputCoreCurrencyMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreCurrencyMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

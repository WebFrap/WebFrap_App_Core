  <div id="wgt-tab-form-wbfsys_language-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_language_details"
        title="<?php echo $I18N->l('Language','wbfsys.language.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_language-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_language-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysLanguageName;?>
          <?php echo $ELEMENT->inputWbfsysLanguageSepTime;?>
          <?php echo $ELEMENT->inputWbfsysLanguageSepDate;?>
          <?php echo $ELEMENT->inputWbfsysLanguageFormatTime;?>
          <?php echo $ELEMENT->inputWbfsysLanguageIsSyslang;?>
          <?php echo $ELEMENT->inputWbfsysLanguageCountryNumber;?>
          <?php echo $ELEMENT->inputWbfsysLanguageKeyRfc1766;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysLanguageKey3;?>
          <?php echo $ELEMENT->inputWbfsysLanguageAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysLanguageSepDec;?>
          <?php echo $ELEMENT->inputWbfsysLanguageSepMil;?>
          <?php echo $ELEMENT->inputWbfsysLanguageFormatDate;?>
          <?php echo $ELEMENT->inputWbfsysLanguageFormatTimestamp;?>
          <?php echo $ELEMENT->inputWbfsysLanguageFlag;?>
          <?php echo $ELEMENT->inputWbfsysLanguageShort;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_language-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_language-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysLanguageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysLanguageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysLanguageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysLanguageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysLanguageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysLanguageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysLanguageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

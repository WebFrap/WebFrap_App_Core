  <div id="wgt-tab-form-wbfsys_custom_color_scheme-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_custom_color_scheme_details"
        title="<?php echo $I18N->l('Custom Color Scheme','wbfsys.custom_color_scheme.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_color_scheme-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_custom_color_scheme-default" >
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeVid;?>

          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeIdEntity;?>

          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeIdUser;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeIdScheme;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_custom_color_scheme-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_custom_color_scheme-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCustomColorSchemeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

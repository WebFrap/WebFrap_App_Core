  <div id="wgt-tab-form-wbfsys_color_scheme-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_color_scheme_details"
        title="<?php echo $I18N->l('Color Scheme','wbfsys.color_scheme.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_scheme-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_color_scheme-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeName;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBgHover;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBorderActive;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBorderDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeFontDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeFontHover;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBorderHover;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeFontActive;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBgActive;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBgDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeDisplayColor;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_scheme-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_color_scheme-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_scheme-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_color_scheme-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

  <div id="wgt-tab-form-wbfsys_entity_color_scheme-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_color_scheme_details"
        title="<?php echo $I18N->l('Entity Color Scheme','wbfsys.entity_color_scheme.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_color_scheme-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_color_scheme-default" >
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeVid;?>

          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeIdEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeIdScheme;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_color_scheme-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_color_scheme-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityColorSchemeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

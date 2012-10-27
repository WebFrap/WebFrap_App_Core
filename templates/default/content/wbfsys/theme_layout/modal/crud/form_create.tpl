  <div id="wgt-tab-form-wbfsys_theme_layout-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_theme_layout_details"
        title="<?php echo $I18N->l('Layout Themes','wbfsys.theme_layout.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_theme_layout-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_theme_layout-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutPath;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_theme_layout-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_theme_layout-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_theme_layout-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_theme_layout-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMUuid;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMVersion;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

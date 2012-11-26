  <div id="wgt-tab-form-wbfsys_color_node-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_color_node_details"
        title="<?php echo $I18N->l('Color Node','wbfsys.color_node.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_node-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_color_node-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeName;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderActive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderInactive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontActive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontHover;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgHover;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeDisplayColor;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgInactive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontInactive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgActive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderHover;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeIdScheme;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_node-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_color_node-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysColorNodeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_node-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_color_node-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

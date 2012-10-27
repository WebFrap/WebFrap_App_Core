  <div id="wgt-tab-form-wbfsys_desktop-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_desktop_details"
        title="<?php echo $I18N->l('Desktop','wbfsys.desktop.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_desktop-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_desktop-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopName;?>
          <?php echo $ELEMENT->inputWbfsysDesktopIdMainTree;?>
          <?php echo $ELEMENT->inputWbfsysDesktopIdMainMenu;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysDesktopRevision;?>
          <?php echo $ELEMENT->inputWbfsysDesktopIdApp;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_desktop-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_desktop-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDesktopDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_desktop-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_desktop-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDesktopRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

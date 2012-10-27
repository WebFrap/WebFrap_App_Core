  <div id="wgt-tab-form-wbfsys_browser_version-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_browser_version_details"
        title="<?php echo $I18N->l('Browser Version','wbfsys.browser_version.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_browser_version-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_browser_version-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserVersionName;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionSupported;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionIdBrowser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserVersionCodeName;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionReleased;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_browser_version-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_browser_version-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysBrowserVersionDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_browser_version-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_browser_version-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserVersionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserVersionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysBrowserVersionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

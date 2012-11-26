  <div id="wgt-tab-form-wbfsys_os_version-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_os_version_details"
        title="<?php echo $I18N->l('OS Version','wbfsys.os_version.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_os_version-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_os_version-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysOsVersionName;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionServerSupported;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionIdOs;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysOsVersionCodeName;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionReleased;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_os_version-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_os_version-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysOsVersionDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_os_version-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_os_version-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysOsVersionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysOsVersionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysOsVersionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

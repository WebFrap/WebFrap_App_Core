  <div id="wgt-tab-form-wbfsys_file_version-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_file_version_details"
        title="<?php echo $I18N->l('File Version','wbfsys.file_version.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_version-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_file_version-default" >
          <?php echo $ELEMENT->inputWbfsysFileVersionMimetype;?>

          <?php echo $ELEMENT->inputWbfsysFileVersionFileHash;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysFileVersionName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysFileVersionFileSize;?>
          <?php echo $ELEMENT->inputWbfsysFileVersionIdFile;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_version-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_file_version-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysFileVersionDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_version-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_file_version-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysFileVersionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysFileVersionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysFileVersionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysFileVersionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysFileVersionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysFileVersionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysFileVersionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

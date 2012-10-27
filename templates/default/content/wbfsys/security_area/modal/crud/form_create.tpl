  <div id="wgt-tab-form-wbfsys_security_area-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_security_area_details"
        title="<?php echo $I18N->l('Security Area','wbfsys.security_area.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_security_area-default" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaVid;?>

          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelDelete;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdSource;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaFlagSystem;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelUpdate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelListing;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefAccess;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefInsert;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefAdmin;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMParent;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdType;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaSourceKey;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaLabel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdTarget;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaParentPath;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaRevision;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelAdmin;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelInsert;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefUpdate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefDelete;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelAccess;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefListing;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaParentKey;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_security_area-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_security_area-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMUuid;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMVersion;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

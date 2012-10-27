
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Mandant','wbfsys.role_mandant.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Mandant base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Mandant.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_mandant-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_role_mandant-default" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantResetPwdKey;?>

          <?php echo $ELEMENT->inputWbfsysRoleMandantResetPwdDate;?>

          <?php echo $ELEMENT->inputWbfsysRoleMandantSaltPassword;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantName;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantType;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantIdThemeLayout;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantDefLevel;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantNonCertLogin;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantPassword;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantChangePassword;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantIdThemeIcon;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantDefProfile;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantInactive;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_mandant-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_role_mandant-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_mandant-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_mandant-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.RoleMandant.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleMandantMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleMandantMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>

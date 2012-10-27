
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Action Log Subscription','wbfsys.action_log_subscription.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_action_log_subscription-default-<?php echo $VAR->entityWbfsysActionLogSubscription; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_action_log_subscription-default-<?php echo $VAR->entityWbfsysActionLogSubscription; ?>" >
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionVid;?>

          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionIdUser;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_action_log_subscription-meta-<?php echo $VAR->entityWbfsysActionLogSubscription; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_action_log_subscription-meta-<?php echo $VAR->entityWbfsysActionLogSubscription; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.ActionLogSubscription.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysActionLogSubscriptionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>

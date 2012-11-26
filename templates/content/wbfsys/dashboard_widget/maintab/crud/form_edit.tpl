
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Dashboard Widget','wbfsys.dashboard_widget.label')?></a></h3>
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
          <span onclick="$S('#wgt-box-wbfsys_dashboard_widget-default-<?php echo $VAR->entityWbfsysDashboardWidget; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_dashboard_widget-default-<?php echo $VAR->entityWbfsysDashboardWidget; ?>" >
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetVid;?>

          <?php echo $ELEMENT->inputWbfsysDashboardWidgetIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetIdWidget;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetIdDashboard;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetPosX;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetNumEntries;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetPosY;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_dashboard_widget-meta-<?php echo $VAR->entityWbfsysDashboardWidget; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_dashboard_widget-meta-<?php echo $VAR->entityWbfsysDashboardWidget; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.DashboardWidget.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDashboardWidgetMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>

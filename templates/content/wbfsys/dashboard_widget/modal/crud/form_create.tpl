  <div id="wgt-tab-form-wbfsys_dashboard_widget-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_dashboard_widget_details"
        title="<?php echo $I18N->l('Dashboard Widget','wbfsys.dashboard_widget.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_dashboard_widget-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_dashboard_widget-default" >
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
          <span onclick="$S('#wgt-box-wbfsys_dashboard_widget-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_dashboard_widget-meta" style="display:none" >
        <div class="left bw3" >
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



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

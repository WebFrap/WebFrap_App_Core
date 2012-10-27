  <div id="wgt-tab-form-wbfsys_widget-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_widget_details"
        title="<?php echo $I18N->l('Widget','wbfsys.widget.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_widget-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_widget-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysWidgetName;?>
          <?php echo $ELEMENT->inputWbfsysWidgetIdManagement;?>
          <?php echo $ELEMENT->inputWbfsysWidgetIdEntity;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysWidgetCname;?>
          <?php echo $ELEMENT->inputWbfsysWidgetAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysWidgetRevision;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_widget-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_widget-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysWidgetDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_widget-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_widget-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysWidgetMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysWidgetMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysWidgetRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysWidgetMUuid;?>
          <?php echo $ELEMENT->inputWbfsysWidgetMVersion;?>
          <?php echo $ELEMENT->inputWbfsysWidgetMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysWidgetMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

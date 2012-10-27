  <div id="wgt-tab-form-wbfsys_entity_calendar-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_calendar_details"
        title="<?php echo $I18N->l('Entity Calendar','wbfsys.entity_calendar.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_calendar-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_calendar-default" >
          <?php echo $ELEMENT->inputWbfsysEntityCalendarVid;?>

          <?php echo $ELEMENT->inputWbfsysEntityCalendarIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCalendarIdCalendar;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_calendar-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_calendar-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCalendarMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityCalendarMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityCalendarRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCalendarMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityCalendarMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityCalendarMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityCalendarMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

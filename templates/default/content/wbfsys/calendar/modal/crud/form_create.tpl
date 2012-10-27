  <div id="wgt-tab-form-wbfsys_calendar-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_calendar_details"
        title="<?php echo $I18N->l('Calendar','wbfsys.calendar.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_calendar-default" >
          <?php echo $ELEMENT->inputWbfsysCalendarVid;?>

          <?php echo $ELEMENT->inputWbfsysCalendarIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysCalendarTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysCalendarIdColorScheme;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_calendar-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysCalendarDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_calendar-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCalendarMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCalendarRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCalendarMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCalendarMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCalendarMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

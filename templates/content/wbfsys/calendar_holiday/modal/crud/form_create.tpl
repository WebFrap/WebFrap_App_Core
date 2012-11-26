  <div id="wgt-tab-form-wbfsys_calendar_holiday-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_calendar_holiday_details"
        title="<?php echo $I18N->l('Holiday','wbfsys.calendar_holiday.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar_holiday-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_calendar_holiday-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayName;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayIdCalendarType;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayLevel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayTheDay;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar_holiday-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_calendar_holiday-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar_holiday-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_calendar_holiday-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayMUuid;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayMVersion;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysCalendarHolidayMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>

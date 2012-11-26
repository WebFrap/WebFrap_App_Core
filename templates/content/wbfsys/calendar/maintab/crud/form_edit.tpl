
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Calendar','wbfsys.calendar.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysCalendarAppointment_Entity')
          && $VAR->showTabAppointments
      ){
    ?>

      <!-- tab: appointments in management: WbfsysCalendarAppointment manytoone -->
      <h3>
        <a
          tab="appointments"
          wgt_src="ajax.php?c=Wbfsys.Calendar_Ref_Appointments.tab&amp;objid=<?php
              echo $VAR->entityWbfsysCalendar->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-appointments&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-appointments" ><?php echo $I18N->l('Appointments','wbfsys.calendar.label')?></a>
      </h3>
      <div>
        
<label>Calendar Appointments</label>
<p>Here you can maintain Calendar Appointments related to the Calendar.</p>
<p>To do so click on "Create new Calendar Appointment".</p>
      

      </div>

    <?php } ?>

        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_calendar-default-<?php echo $VAR->entityWbfsysCalendar; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_calendar-default-<?php echo $VAR->entityWbfsysCalendar; ?>" >
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
          <span onclick="$S('#wgt-box-wbfsys_calendar-description-<?php echo $VAR->entityWbfsysCalendar; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_calendar-description-<?php echo $VAR->entityWbfsysCalendar; ?>" >
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
          <span onclick="$S('#wgt-box-wbfsys_calendar-meta-<?php echo $VAR->entityWbfsysCalendar; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_calendar-meta-<?php echo $VAR->entityWbfsysCalendar; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Calendar.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
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
      
      
      <div class="container" id="<?php echo $this->id?>-content-appointments" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>

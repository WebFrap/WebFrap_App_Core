
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_calendar_appointment-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_calendar_appointment-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_calendar_appointment-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_calendar_appointment-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_calendar_appointment-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_calendar_appointment-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_calendar_appointment-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_calendar_appointment-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-selection-wbfsys_calendar_appointment-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysCalendarAppointmentSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a Calendar Appointment press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysCalendarAppointment?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysCalendarAppointment->searchForm}', null, {search:true});
});

JS
); ?>
    

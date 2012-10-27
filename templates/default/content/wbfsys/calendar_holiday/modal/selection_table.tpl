
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_calendar_holiday-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_calendar_holiday-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_calendar_holiday-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_calendar_holiday-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_calendar_holiday-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_calendar_holiday-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_calendar_holiday-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_calendar_holiday-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-selection-wbfsys_calendar_holiday-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-selection-wbfsys_calendar_holiday-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysCalendarHolidaySearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a Holiday press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysCalendarHoliday?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysCalendarHoliday->searchForm}', null, {search:true});
});

JS
); ?>
    

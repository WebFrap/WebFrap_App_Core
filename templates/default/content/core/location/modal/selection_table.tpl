
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-core_location-advanced"  style="display:none" >

      <div id="wgt_tab-selection-core_location-search" class=""  >
        <div 
        	id="wgt_tab-selection-core_location-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-core_location-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-core_location-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-core_location-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-core_location-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-core_location-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-selection-core_location-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputCoreLocationSearchMRoleCreate?>
              <?php echo $ELEMENT->inputCoreLocationSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputCoreLocationSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreLocationSearchMRoleChange?>
              <?php echo $ELEMENT->inputCoreLocationSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputCoreLocationSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreLocationSearchMUuid?>
              <?php echo $ELEMENT->inputCoreLocationSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a location press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionCoreLocation?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionCoreLocation->searchForm}', null, {search:true});
});

JS
); ?>
    

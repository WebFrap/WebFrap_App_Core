
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_issue_severity-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_issue_severity-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_issue_severity-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_issue_severity-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_issue_severity-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_issue_severity-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_issue_severity-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_issue_severity-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-selection-wbfsys_issue_severity-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-selection-wbfsys_issue_severity-search-content-description"
          title="Description"
          wgt_key="description" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchDescription;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-selection-wbfsys_issue_severity-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysIssueSeveritySearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a issue severity press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysIssueSeverity?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysIssueSeverity->searchForm}', null, {search:true});
});

JS
); ?>
    

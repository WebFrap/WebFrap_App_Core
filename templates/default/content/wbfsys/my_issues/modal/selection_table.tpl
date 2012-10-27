
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_my_issues-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_my_issues-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_my_issues-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_my_issues-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_my_issues-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_my_issues-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_my_issues-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_my_issues-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-selection-wbfsys_my_issues-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchIdPriority;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchIdOs;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchIdBrowser;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchIdSeverity;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchIdCategory;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-selection-wbfsys_my_issues-search-content-description"
          title="Description"
          wgt_key="description" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesSearchDescription;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-selection-wbfsys_my_issues-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysMyIssuesSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a My Issues press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysMyIssues?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysMyIssues->searchForm}', null, {search:true});
});

JS
); ?>
    



  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_person_duplicate_suspicion-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-table-wbfsys_person_duplicate_suspicion-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableWbfsysPersonDuplicateSuspicion; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="application/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

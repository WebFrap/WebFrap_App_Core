

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-core_organisation-advanced"  style="display:none" >

      <div id="wgt_tab-table-core_organisation-search" class=""  >
        <div 
        	id="wgt_tab-table-core_organisation-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-core_organisation-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-core_organisation-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-core_organisation-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-core_organisation-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-core_organisation-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-core_organisation-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreOrganisationSearchName;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-core_organisation-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputCoreOrganisationSearchMRoleCreate?>
              <?php echo $ELEMENT->inputCoreOrganisationSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputCoreOrganisationSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreOrganisationSearchMRoleChange?>
              <?php echo $ELEMENT->inputCoreOrganisationSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputCoreOrganisationSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreOrganisationSearchMUuid?>
              <?php echo $ELEMENT->inputCoreOrganisationSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableCoreOrganisation; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>



  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-core_person-advanced"  style="display:none" >

      <div id="wgt_tab-table-core_person-search" class=""  >
        <div 
        	id="wgt_tab-table-core_person-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-core_person-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-core_person-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-core_person-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-core_person-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-core_person-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-core_person-search-content-default"
          title="Base Data"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputCorePersonSearchFirstname;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCorePersonSearchLastname;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-core_person-search-content-ident_data"
          title="Ident Data"
          wgt_key="ident_data" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputCorePersonSearchTaxNumber;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCorePersonSearchPkid;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-core_person-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputCorePersonSearchMRoleCreate?>
              <?php echo $ELEMENT->inputCorePersonSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputCorePersonSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCorePersonSearchMRoleChange?>
              <?php echo $ELEMENT->inputCorePersonSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputCorePersonSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCorePersonSearchMUuid?>
              <?php echo $ELEMENT->inputCorePersonSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableCorePerson; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

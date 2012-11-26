

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_menu_entry-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_menu_entry-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_menu_entry-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_menu_entry-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_menu_entry-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_menu_entry-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_menu_entry-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_menu_entry-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_menu_entry-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMenuEntrySearchLabel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMenuEntrySearchHttpUrl;?>
          <?php echo $ELEMENT->inputWbfsysMenuEntrySearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_menu_entry-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysMenuEntrySearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableWbfsysMenuEntry; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="application/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

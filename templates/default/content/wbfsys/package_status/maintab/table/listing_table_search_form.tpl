  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_package_status-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_package_status-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_package_status-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_package_status-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_package_status-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_package_status-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_package_status-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_package_status-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_package_status-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysPackageStatusSearchName;?>
          <?php echo $ELEMENT->inputWbfsysPackageStatusSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-wbfsys_package_status-search-content-description"
          title="Description"
          wgt_key="description" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysPackageStatusSearchDescription;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_package_status-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysPackageStatusSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_role_user_mask_employee-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_role_user_mask_employee-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_role_user_mask_employee-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_role_user_mask_employee-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_role_user_mask_employee-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_role_user_mask_employee-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_role_user_mask_employee-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_role_user_mask_employee-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_role_user_mask_employee-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedPersonSearchLastname;?>
          <?php echo $ELEMENT->inputEmbedPersonSearchFirstname;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchProfile;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchLevel;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-wbfsys_role_user_mask_employee-search-content-contact"
          title="Contact"
          wgt_key="contact" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchEmail;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-wbfsys_role_user_mask_employee-search-content-ident_data"
          title="Ident Data"
          wgt_key="ident_data" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedPersonSearchTaxNumber;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputEmbedPersonSearchPkid;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_role_user_mask_employee-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableWbfsysRoleUserMaskEmployee; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

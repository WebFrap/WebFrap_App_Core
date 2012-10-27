

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-my_user_profile-advanced"  style="display:none" >

      <div id="wgt_tab-table-my_user_profile-search" class=""  >
        <div 
        	id="wgt_tab-table-my_user_profile-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-my_user_profile-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-my_user_profile-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-my_user_profile-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-my_user_profile-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-my_user_profile-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-my_user_profile-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputEmbedPersonSearchLastname;?>
          <?php echo $ELEMENT->inputEmbedPersonSearchFirstname;?>
          <?php echo $ELEMENT->inputMyUserProfileSearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputMyUserProfileSearchProfile;?>
          <?php echo $ELEMENT->inputMyUserProfileSearchLevel;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-my_user_profile-search-content-contact"
          title="Contact"
          wgt_key="contact" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputMyUserProfileSearchEmail;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-my_user_profile-search-content-ident_data"
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
            id="wgt_tab-table-my_user_profile-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputMyUserProfileSearchMRoleCreate?>
              <?php echo $ELEMENT->inputMyUserProfileSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputMyUserProfileSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputMyUserProfileSearchMRoleChange?>
              <?php echo $ELEMENT->inputMyUserProfileSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputMyUserProfileSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputMyUserProfileSearchMUuid?>
              <?php echo $ELEMENT->inputMyUserProfileSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableMyUserProfile; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

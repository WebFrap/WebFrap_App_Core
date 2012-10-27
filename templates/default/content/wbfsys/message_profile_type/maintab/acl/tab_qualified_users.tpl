<?php if( true ){ ?>

  <form
    method="get"
    accept-charset="utf-8"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" ></form>

  <?php echo $ELEMENT->listingQualifiedUsers ?>

  <form
    method="post"
    accept-charset="utf-8"
    id="<?php echo $VAR->formIdAppend?>"
    action="<?php echo $VAR->formActionAppend?>" >

    <!-- Assignment Panel -->
    <div class="wgt-panel" style="height:190px;" >

      <h3><?php echo $I18N->l( 'Assign Users', 'wbf.label' ); ?></h3>

      <!-- formular -->
      <div class="left half" >

        <!-- group input -->
        <div class="left" >
          <label
            class="wgt-label"
            for="<?php echo $ELEMENT->selectboxGroups->id ?>" ><?php echo $I18N->l( 'Group', 'wbf.label' ); ?></label>
          <div class="wgt-input medium" >
            <?php echo $ELEMENT->selectboxGroups->niceElement() ?>
          </div>
        </div>

        <!-- user input -->
        <div class="left" >

          <label
            class="wgt-label"
            for="wgt-input-wbfsys_message_profile_type-acl-qfdu-id_user" ><?php echo $I18N->l( 'User', 'wbf.label' ); ?></label>

          <div class="wgt-input medium" >
            <input
              type="text"
              id="wgt-input-wbfsys_message_profile_type-acl-qfdu-id_user-tostring"
              name="key"
              title="Just type in the namen of the user, or klick on search for an extended search"
              class="medium wcm wcm_ui_autocomplete wgt-ignore wcm_ui_tip"  />
            <var class="wgt-settings" >{
                "url":"ajax.php?c=Wbfsys.MessageProfileType_Acl.loadQfdUsers&amp;area_id=<?php
                  echo $VAR->areaId
                 ?>&amp;key=",
                "type":"entity"
              }
            </var>
            <input
              type="text"
              id="wgt-input-wbfsys_message_profile_type-acl-qfdu-id_user"
              name="wbfsys_group_users[id_user]"
              class="meta valid_required"  />
            <button
              id="wgt-button-wbfsys_message_profile_type-acl-advanced_search"
              class="wgt-button append"
              onclick="$R.get('modal.php?c=Wbfsys.RoleUser.selection&amp;input=wbfsys_message_profile_type-acl-qfdu-id_user');return false;"    >
              <img src="<?php echo View::$iconsWeb ?>xsmall/control/search.png" alt="search" />
            </button>
          </div>

        </div>

        <!-- message profile Type Entity -->
        <div class="left"  >

          <label
            class="wgt-label"
            for="wgt-input-wbfsys_message_profile_type-acl-qfdu-vid" >message profile Type</label>

          <div class="wgt-input medium" >
            <input
              type="text"
              id="wgt-input-wbfsys_message_profile_type-acl-qfdu-vid-tostring"
              title="Just type in the namen of the message profile Type, or klick on search for an extended search"
              name="key"
              class="medium wcm wcm_ui_autocomplete wgt-ignore wcm_ui_tip"
            />
            <var class="wgt-settings" >{
                "url":"ajax.php?c=Wbfsys.MessageProfileType_Acl.loadQfduEntity&amp;area_id=<?php echo $VAR->areaId ?>&amp;key=",
                "type":"entity"
              }</var>
            <input
              type="text"
              id="wgt-input-wbfsys_message_profile_type-acl-qfdu-vid"
              name="wbfsys_group_users[vid]"
              class="meta valid_required"
            />
            <button
              id="wgt-input-wbfsys_message_profile_type-acl-qfdu-vid-append"
              class="wgt-button append"
              onclick="$R.get('modal.php?c=Wbfsys.MessageProfileType.selection&amp;input=wbfsys_message_profile_type-acl-qfdu-vid');return false;"
            >
              <img src="<?php echo View::$iconsWeb ?>xsmall/control/search.png" alt="search" />
            </button>
         </div>

         <!-- Assign Full -->
         <div class="left" >
           <label
             class="wgt-label"
             for="wgt-input-wbfsys_message_profile_type-acl-qfdu-flagfull" ><?php echo $I18N->l( 'Assign Full', 'wbf.label') ?></label>

           <div class="wgt-input medium" >
            <input
              type="checkbox"
              id="wgt-input-wbfsys_message_profile_type-acl-qfdu-flagfull"
              name="assign_full"
            />
          </div>
         </div>

       </div>


       <!-- buttons -->
       <div class="left" >

        <input
          type="text"
          id="wgt-input-wbfsys_message_profile_type-acl-qfdu-id_area"
          name="wbfsys_group_users[id_area]"
          value="<?php echo $VAR->areaId?>"
          class="meta"
        />

        <button
          class="wgt-button"
          id="wgt-button-wbfsys_message_profile_type-acl-qfdu-append"
          onclick="$R.form('wgt-form-wbfsys_message_profile_type-acl-qfdu-append');$UI.form.reset('wgt-form-wbfsys_message_profile_type-acl-qfdu-append');return false;" >
          <img src="<?php echo View::$iconsWeb ?>xsmall/control/connect.png" alt="connect" /> Append
        </button>

        &nbsp;&nbsp;|&nbsp;&nbsp;

        <button
          class="wgt-button"
          id="wgt-button-wbfsys_message_profile_type-acl-qfdu-reload"
          onclick="$R.get('ajax.php?c=Wbfsys.MessageProfileType_Acl.tabQualifiedUsers&amp;area_id=<?php echo $VAR->areaId ?>&amp;tabid=wgt_tab-wbfsys_message_profile_type_acl_listing_tab_wbfsys_message_profile_type-acl_qfd_users');return false;" >
          <img src="<?php echo View::$iconsWeb ?>xsmall/control/refresh.png" alt="Reload" /> Reload
        </button>

      </div>

    </form>

  </div>

<script type="text/javascript">

<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

<?php } ?>
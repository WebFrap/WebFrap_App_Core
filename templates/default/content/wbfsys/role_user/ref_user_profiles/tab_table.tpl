  <?php if( $ELEMENT->tableUserProfiles ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionUserProfiles.$ELEMENT->tableUserProfiles->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdUserProfiles?>" >

       <input
        type="hidden"
        name="search_wbfsys_user_profiles[id_user]"
        value="<?php echo $VAR->refIdUserProfiles?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableUserProfiles ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdUserProfiles?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.RoleUser_Ref_UserProfiles.connect<?php echo $ELEMENT->tableUserProfiles->getJsAccessPath();?>',{
            'wbfsys_user_profiles[id_user]':'<?php echo $VAR->refIdUserProfiles?>',
            'wbfsys_user_profiles[id_profile]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
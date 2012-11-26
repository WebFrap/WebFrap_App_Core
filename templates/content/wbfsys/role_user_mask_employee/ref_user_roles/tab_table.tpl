  <?php if( $ELEMENT->tableUserRoles ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionUserRoles.$ELEMENT->tableUserRoles->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdUserRoles?>" >

       <input
        type="hidden"
        name="search_wbfsys_group_users[id_user]"
        value="<?php echo $VAR->refIdUserRoles?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableUserRoles ?>


    <script type="application/javascript" >
      $S('#<?php echo $VAR->searchFormIdUserRoles?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.RoleUserMaskEmployee_Ref_UserRoles.connect<?php echo $ELEMENT->tableUserRoles->getJsAccessPath();?>',{
            'wbfsys_group_users[id_user]':'<?php echo $VAR->refIdUserRoles?>',
            'wbfsys_group_users[id_group]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
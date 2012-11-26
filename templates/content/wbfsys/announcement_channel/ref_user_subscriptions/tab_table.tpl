  <?php if( $ELEMENT->tableUserSubscriptions ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionUserSubscriptions.$ELEMENT->tableUserSubscriptions->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdUserSubscriptions?>" >

       <input
        type="hidden"
        name="search_wbfsys_announcement_channel_subscription[id_channel]"
        value="<?php echo $VAR->refIdUserSubscriptions?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableUserSubscriptions ?>


    <script type="application/javascript" >
      $S('#<?php echo $VAR->searchFormIdUserSubscriptions?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.AnnouncementChannel_Ref_UserSubscriptions.connect<?php echo $ELEMENT->tableUserSubscriptions->getJsAccessPath();?>',{
            'wbfsys_announcement_channel_subscription[id_channel]':'<?php echo $VAR->refIdUserSubscriptions?>',
            'wbfsys_announcement_channel_subscription[id_role]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
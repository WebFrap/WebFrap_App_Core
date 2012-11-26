  <?php if( $ELEMENT->tableGroupSubscriptions ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionGroupSubscriptions.$ELEMENT->tableGroupSubscriptions->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdGroupSubscriptions?>" >

       <input
        type="hidden"
        name="search_wbfsys_announcement_channel_subscription[id_channel]"
        value="<?php echo $VAR->refIdGroupSubscriptions?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableGroupSubscriptions ?>


    <script type="application/javascript" >
      $S('#<?php echo $VAR->searchFormIdGroupSubscriptions?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.AnnouncementChannel_Ref_GroupSubscriptions.connect<?php echo $ELEMENT->tableGroupSubscriptions->getJsAccessPath();?>',{
            'wbfsys_announcement_channel_subscription[id_channel]':'<?php echo $VAR->refIdGroupSubscriptions?>',
            'wbfsys_announcement_channel_subscription[id_role]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
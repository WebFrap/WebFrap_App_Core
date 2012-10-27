  <?php if( $ELEMENT->tableStatus ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionStatus.$ELEMENT->tableStatus->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdStatus?>" >

       <input
        type="hidden"
        name="search_wbfsys_user_announcement[id_announcement]"
        value="<?php echo $VAR->refIdStatus?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableStatus ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdStatus?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.Announcement_Ref_Status.connect<?php echo $ELEMENT->tableStatus->getJsAccessPath();?>',{
            'wbfsys_user_announcement[id_announcement]':'<?php echo $VAR->refIdStatus?>',
            'wbfsys_user_announcement[id_user]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
  <?php if( $ELEMENT->tableSendWay ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionSendWay.$ELEMENT->tableSendWay->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdSendWay?>" >

       <input
        type="hidden"
        name="search_wbfsys_message_sendway[id_message]"
        value="<?php echo $VAR->refIdSendWay?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableSendWay ?>



  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
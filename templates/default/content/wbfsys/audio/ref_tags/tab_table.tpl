  <?php if( $ELEMENT->tableTags ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionTags.$ELEMENT->tableTags->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdTags?>" >

       <input
        type="hidden"
        name="search_wbfsys_entity_tag[vid]"
        value="<?php echo $VAR->refIdTags?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableTags ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdTags?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.Audio_Ref_Tags.connect<?php echo $ELEMENT->tableTags->getJsAccessPath();?>',{
            'wbfsys_entity_tag[vid]':'<?php echo $VAR->refIdTags?>',
            'wbfsys_entity_tag[id_tag]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>
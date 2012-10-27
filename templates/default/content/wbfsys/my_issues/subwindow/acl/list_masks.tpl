<?php
  $iconEdit = $this->icon( 'control/edit', 'Edit' );
?>
<div class="window_body" >
    
  <fieldset>
    <legend>List Masks</legend>

    <table class="wgt-table" style="width:750px;" >
      <thead>
        <tr>
          <th>Name</th>
          <th>Label</th>
          <th>Description</th>
          <th>Nav:</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="wgt-clickable wgtac_mask_wbfsys_issue" >wbfsys_issue<span></td>
          <td><?php echo $this->i18n->l( 'Issue', 'wbfsys.issue.label' ); ?></td>
          <td></td>
          <td><button class="wgt-button wgtac_mask_wbfsys_issue" ><?php echo $iconEdit ?></button></td>
        </tr>

      </tbody>
    </table>

  </fieldset>

  <div class="wgt-clear small">&nbsp;</div>

</div>

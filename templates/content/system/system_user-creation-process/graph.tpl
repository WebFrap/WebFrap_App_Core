<?php

$iconBack = $this->icon('process/back.png','Back');
$iconForward = $this->icon('process/forward.png','Forward');
$iconResponsible = $this->icon('control/receiver.png','Responsible');

?>  

<div id="wgt-graph-system_user-creation-<?php echo $VAR->entity->getId() ?>-uform"  class="wgt-editor_form" >
  <div class="wcm wcm_ui_accordion" >
  
    <h3><a href="#">Process Data</a></h3>
    <div>
      <h2>Process System User</h2>
      
      <label>Description</label>
      <div class="wgt-bspace" ></div>
      
      <label>Stats</label>
      <table>
        <tr>
          <td>Project:</td>
          <td><?php echo $VAR->entity->text(); ?></td>
        </tr>
        <tr>
          <td>Active node:</td>
          <td><?php echo $VAR->activeNode->label; ?></td>
        </tr>
        <tr>
          <td>Process start:</td>
          <td><?php echo $VAR->process->activStatus->getTimeStamp('m_time_created'); ?></td>
        </tr>
        <tr>
          <td>Number nodes:</td>
          <td>1</td>
        </tr>
      </table>
      
    </div>
    
    <h3><a href="#" >Node Data</a></h3>
    <div>
    <div 
      id="wgt-graph-system_user-creation-<?php echo $VAR->entity->getId() ?>-info-new"
      class="node_entry <?php echo $VAR->process->activKey == 'new'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'new'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: New</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >start</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >New</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
        
      </ul>
      
    </div>

    </div>
    
    <h3><a href="#" >Responsibles</a></h3>
    <div>
      <h2>Responsibles</h2>
      <ul>
</ul>

    </div>
    
    <h3><a href="#" >History</a></h3>
    <div>
      <h2>History</h2>
    </div>

  </div>
  <var>{"fillSpace": true,"animated": false}</var>
</div>

<div 
  id="wgt-graph-system_user-creation-<?php echo $VAR->entity->getId() ?>" 
  class="wgt-editor_container wcm wcm_widget_process_editor" >
<var>{
"label":"System User",
"description":null,
"messages":"",
"actions":"",
"responsibles":""
}</var>
  
  <div class="wgt-graph_body" >
    <div 
      id="wgt-graph-system_user-creation-<?php echo $VAR->entity->getId() ?>-n-new" 
      class="node pos_auto wgt-corner start <?php echo $VAR->process->activKey == 'new'?'active':''; ?>"  >
        <var>{ 
        "label":"New",
        "key":"new",
        "phase_label":"",
        "phase_key":"",
        "description":"New",
        "type":"start",
        "edges":[]
        }</var>
        <label>New</label>
    </div>

  </div>
  
</div>

<div class="wgt-clear" ></div>

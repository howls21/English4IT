<?php $n_question = 0 ?>
<div class="col s12 m6">
  <?php $o = 0; foreach ($unity_has_section as $fil_uhs):?>
    <?php $i = 0; foreach ($unity as $fil_unity):?>
      <?php if($fil_uhs->section_idsection === $idsection && $fil_uhs->unity_idunity === $fil_unity->idunity):?>
        <div class="card">
          <div class="card-content">
            <span class="card-title"><i class="material-icons">view_module</i> UNIT <strong><?php echo $fil_unity->unityname?></strong></span>
            <p>
              <ul class="collapsible" data-collapsible="accordion">
                <?php $e = 0; foreach ($activity_has_unity as $fil_ahu):?>
                  <?php $a = 0; foreach ($activity as $fil_activity):?>
                    <?php if($fil_ahu->unity_idunity === $fil_unity->idunity && $fil_ahu->activity_idactivity === $fil_activity->idactivity):?>
                      <li>
                        <div class="collapsible-header"><i class="material-icons">view_compact</i>ACTIVITY <br>  <strong><?php echo $fil_activity->activityname?></strong></div>
                        <div class="collapsible-body">
                          <?php $que = 0; foreach ($question_has_activity as $fil_qha):?>
                            <?php $q = 0; foreach($question as $fil_question): ?>
                            <?php if($fil_qha->question_idquestion === $fil_question->idquestion && $fil_qha->activity_idactivity === $fil_activity->idactivity):?>
                              <blockquote><?php echo $fil_question->questionname?></blockquote>
                                  <?php $mod = 0; foreach($mode as $fil_mode):?>
                                     <?php if($fil_question->mode_idmode === $fil_mode->idmode && $fil_mode->namemode === 'Complete'):?>
                                      <div>
                                    <?php 

                                          ###--------INICIALIZA RANGO DONDE DEBE ESTAR LA PALABRA----------###
                                              $inicial = "@";
                                              $final = "$";
                                          ###--------BUSCA LA POSICIÓN DEL PRIMER CARACTER DE LA PALABRA @---###
                                              $start = strpos($fil_question->description, $inicial);
                                          ###--------BUSCA LA POSICIÓN DEL ÚLTIMO CARACTER DE LA PALABRA $---###
                                              $stop = strpos($fil_question->description,  $final);
                                          ###--------EXTRAE CON LAS POSICIONES LA PALABRA------------------###
                                              $answerTxt = substr($fil_question->description, $start ,$stop);
                                          ###--------QUITA LAS MARCAR DE LA PALABRA------------------------###
                                              $answerbox = array (trim($answerTxt,'@$'));
                                                
                                              
                                          echo substr($fil_question->description, 0, $start);
                                          echo "<input>";
                                          echo trim(substr($fil_question->description, $stop),'@$');
 
                                    ?>
                                  </div>
                                  <?php endif;?>
                                  <?php $mod++; endforeach; ?>
                              <?php endif;?>  
                            <?php $q++; endforeach;?>
                          <?php $que++; endforeach;?>
                        </div>
                      </li>
                    <?php endif;?>
                  <?php $a++; endforeach;?>
                <?php $e++; endforeach;?>
              </ul>
            </p>
          </div>
        </div>
      <?php endif;?>
    <?php $i++; endforeach; ?>
  <?php $o++; endforeach; ?>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('.modal').modal();
    $('#collapsible').collapsible('active');
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
        //Materialize effects
        $('.tooltipped').tooltip({delay: 50});
      });
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });



  // target elements with the "draggable" class
interact('.draggable')
  .draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    restrict: {
      restriction: "parent",
      endOnly: true,
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    },
    // enable autoScroll
    autoScroll: true,

    // call this function on every dragmove event
    onmove: dragMoveListener,
    // call this function on every dragend event
    onend: function (event) {
      var textEl = event.target.querySelector('p');

      textEl && (textEl.textContent =
        'moved a distance of '
        + (Math.sqrt(event.dx * event.dx +
                     event.dy * event.dy)|0) + 'px');
    }
  });

  function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
  }

  // this is used later in the resizing and gesture demos
  window.dragMoveListener = dragMoveListener;

// enable draggables to be dropped into this
interact('.dropzone').dropzone({
  // only accept elements matching this CSS selector
  accept: '#yes-drop',
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.75,

  // listen for drop related events:

  ondropactivate: function (event) {
    // add active dropzone feedback
    event.target.classList.add('drop-active');
  },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget,
        dropzoneElement = event.target;

    // feedback the possibility of a drop
    dropzoneElement.classList.add('drop-target');
    draggableElement.classList.add('can-drop');
    draggableElement.textContent = 'Dragged in';
  },
  ondragleave: function (event) {
    // remove the drop feedback style
    event.target.classList.remove('drop-target');
    event.relatedTarget.classList.remove('can-drop');
    event.relatedTarget.textContent = 'Dragged out';
  },
  ondrop: function (event) {
    event.relatedTarget.textContent = 'Dropped';
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback
    event.target.classList.remove('drop-active');
    event.target.classList.remove('drop-target');
  }
});
</script>


<style type="text/css">
  #outer-dropzone {
  height: 140px;
}

#inner-dropzone {
  height: 80px;
}

.dropzone {
  background-color: #ccc;
  border: dashed 4px transparent;
  border-radius: 4px;
  margin: 10px auto 30px;
  padding: 10px;
  width: 80%;
  transition: background-color 0.3s;
}

.drop-active {
  border-color: #aaa;
}

.drop-target {
  background-color: #29e;
  border-color: #fff;
  border-style: solid;
}

.drag-drop {
  display: inline-block;
  min-width: 40px;
  padding: 2em 0.5em;

  color: #fff;
  background-color: #29e;
  border: solid 2px #fff;

  -webkit-transform: translate(0px, 0px);
          transform: translate(0px, 0px);

  transition: background-color 0.3s;
}

.drag-drop.can-drop {
  color: #000;
  background-color: #4e4;
}
</style>
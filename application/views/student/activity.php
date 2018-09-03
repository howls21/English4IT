<a class="btn modal-trigger deep-orange darken-1" href="#Materials"><i class="material-icons right">attachment</i><strong> Materials</strong></a>

  <!-- MODALs News-->
  <div id="Materials" class="modal modal-fixed-footer">
    <div class="modal-content">

<?php $o = 0; foreach ($material_has_activity as $filmha): ?>
     <?php $i = 0; foreach ($material as $filmaterial):?>
        <?php if($filmha->material_idmaterial === $filmaterial->idmaterial):?>

            <?php if($filmaterial->materialtype_idmaterialtype === '1'):?>
               <div class="card" id="cardpdf<?php echo $i?>">
                      <div class="card-image">
                        <br><object data="media/<?php echo $filmaterial->route?>" type="application/pdf" width="100%" height="100%"/><br>
                      </div>
                      <div class="card-content">
                          <span><i class="material-icons">insert_link</i> <?php echo $filmaterial->materialname?></span>
                        <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" >
                        <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                        <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
                      </div>
                      <div class="card-action">
                      </div>
               </div>
            <?php endif;?>
            <?php if($filmaterial->materialtype_idmaterialtype === '2'):?>
                  <div class="card" id="cardaudio<?php echo $i?>">
                      <div class="card-image">
                        <br>
                        <audio controls>
                          <source src="media/<?php echo $filmaterial->route?>">
                            Tu navegador no soporta HTML5 audio.
                        </audio>
                        <br>
                      </div>
                      <div class="card-content">
                        <span><i class="material-icons">speaker</i> <?php echo $filmaterial->materialname?></span>
                        <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" >
                  <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                  <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
                      </div>
                      <div class="card-action">
                   </div>
                    </div>
            <?php endif;?>
            <?php if($filmaterial->materialtype_idmaterialtype === '3'):?>
             <div class="card" id="cardvideo<?php echo $i?>">
              <div class="card-image">

                <video class="responsive-video" controls>
                  <source src="media/<?php echo $filmaterial->route?>" controls>
                  </video>
                </div>
                <div class="card-content">
                  <span><i class="material-icons">videocam</i> <?php echo $filmaterial->materialname?></span>
                  <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" >
                  <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                  <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
                </div>
                <div class="card-action">
      
                </div>
              </div>
            <?php endif;?>
            <?php if($filmaterial->materialtype_idmaterialtype === '4'):?>
              <div class="card" id="cardyoutube<?php echo $i?>">
                <div class="card-image">

                  <div class="video-container">

                    <?php
                    $original = $filmaterial->link;
                    $length = strlen($original);
                    $base = substr($original,0,24);
                    $dir = substr($original, strpos($original, "=") + 1, $length);
                    $link = $base . "embed/" . $dir . "?enablejsapi=1";?>
                    <iframe width="360" height="480" src="<?php  echo $link;?>" frameborder="1" allowfullscreen></iframe>

                  </div>

                  <span class="card-title">Material</span>
                </div>
                <div class="card-content">
                  <span><i class="material-icons">videocam</i> <?php echo $filmaterial->materialname?></span>
                  <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" hidden>
                  <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                  <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
                </div>
                <div class="card-action">

                </div>
              </div>
            <?php endif;?>

            <?php $checkcount = $i?>
        <?php endif;?>
        <?php $i++; endforeach; ?>
<?php $o++; endforeach; ?>
    </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
  </div>
</div>

<?php $ac = 0; foreach($activity as $filac):?>
  <div class="">
      <h4><strong>Activity:</strong> <?php echo $filac->activityname?></h4>
  <?php $f = 0; foreach ($question as $filq): ?>
    <?php if($filac->idactivity === $filq->activity_idactivity ): ?>
      <?php echo $f+1 ?>. <?php echo $filq->questionname?>
          <form action="#">
              <?php $an = 0; foreach($answer as $filan):?>
                <?php if($filan->question_idquestion === $filq->idquestion): ?>
                  <blockquote>
                  <p>
                    <input class="with-gap" name="group1" type="radio" id="answer<?php echo $an?>" value="<?php echo $filan->value_idvalue?>" />
                    <label for="answer<?php echo $an?>"><?php echo $filan->answername?></label>
                  </p>
                </blockquote>
                <?php endif;?>
              <?php $an++; endforeach; ?>
          </form>
    <?php endif;?>
  <?php $f++; endforeach; ?>
  </div>
<?php $ac++; endforeach; ?>

<button class="btn black waves-effect waves"><i class="material-icons right">send</i><strong> Response</strong></button>
        




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
</script>
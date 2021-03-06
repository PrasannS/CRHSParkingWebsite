<?php
class MapView extends StudentsPageView
{
  protected $title = 'CRHS parking - Senior Lot';

  protected function renderBody()
  {
    $spots = (new MapDatabaseModel())->getAllFromLot($_GET['do']);
    ?>
    <div class="defaults-page">
      <div class="defaults-container">
        <h3>Senior Lot</h3>
        <center>
          <div style="overflow: auto;">
          <div class="map-<?= $_GET['do']?>-container">
            <div class="map-hover" onclick="gotohub()">
              <div class="map-back">
                <img src="/images/back.png" width="auto" height="auto">
                Back
              </div>
            </div>
            <?php
              foreach($spots as $spot)
              {
                if($spot['statues'] == 0)
                {
            ?>
                <div class="map-button" style="top:<?= $spot['pos_y']?>%;left:<?= $spot['pos_x']?>%;width:<?= $spot['width']?>%;height:<?= $spot['height']?>%;" id="<?= $spot['spot_number']?>">
                  <div class="map-popup">
                    <div><?= $spot['spot_number']?></div>
                  </div>
                </div>
            <?php
                }
                else
                {
            ?>
              <img src="/images/cars/<?= $spot['color']?>car.png" class="map-car"  style="top:<?= $spot['pos_y']?>%;left:<?= $spot['pos_x']?>%;width:<?= $spot['width']+.4?>%;height:<?= $spot['height']+.2?>%;"></div>
            <?php
                }
              }
            ?>
            <!--
            <div class="map-button" style="top:51%;left:55.6%;" id="1623"><div class="map-popup"><div>1623</div></div></div> this is what an empty spot would look like
            -->
          </div>
        </div>
        </center>
      </div>
    </div>
    <?php
  }
}
 ?>

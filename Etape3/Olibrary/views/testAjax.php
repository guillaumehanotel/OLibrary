
<?php

$titre = $_GET['titre'];
$date = $_GET['date'];
$synopsis = $_GET['synopsis'];



?>

<div class="row" id="notice_edit">

<div class="col s12 m10 offset-m1">
    <div class="card grey darken-2">

        <form action="">

            <div class="card-content white-text">

                <i id="mode_edit"  class="small material-icons right">mode_edit</i>

                <h5 class="center">NOTICE</h5>
                <span class="card-title"><?= $titre ?></span>
                <p><?= $date ?></p>
            </div>

            <div class="card-action white-text">
                <?= $synopsis ?>
            </div>

        </form>


    </div>
</div>

</div>
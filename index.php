<?php require("config.php"); ?>
<?php require("header.php"); ?>
<?php require("functions.php"); ?>
<?php
$server_directory = array();
// $directory_name = "C://Users/Stalin/Dropbox/DropsyncFiles";
?>
<?php if ($gestor = opendir(DIRECTORY_URL)) : ?>
    <?php
        while (($archivo = readdir($gestor)) !== false) {
            if ((!is_file($archivo)) and ($archivo != '.') && ($archivo != '..')) {
                $server_directory[$archivo] = $archivo;
            }
        }
        closedir($gestor);
        ?>

<div class="container_fixed">
    <h1 class="center">Listado de Canciones Stalin</h1>
    <br>
    <div>
        <audio id="audio" preload="auto" tabindex="0" controls="" volume="0.4">
            <source id="audio_source" src="https://s3-us-west-2.amazonaws.com/allmetalmixtapes/Saxon%20-%201984%20-%20Crusader/01%20-%20Crusader%20Prelude.mp3">
        </audio>
            <small>Audio por Stalin Maza</small>
    </div>
    <br>
</div>


    <div class='music_songs'>
        <div class="responsive-table">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nº</th>
                        <th>Nombre</th>
                        <th>PLAY</th>
                    </tr>
                </thead>
                <tbody id="list_songs">
                    <?php $contador = 1; ?>
                    <?php foreach ($server_directory as $key_dir => $directory) : ?>
                        <tr class="song_item">
                            <td> <?= $contador ?> </td>
                            <td> <?= $directory ?> </td>
                            <td>
                                <button class="reproductor_main" id="<?=$directory ?>">Play</button>
                                <!-- <i class="reproductor_main" id="<?=$directory ?>" class="fas fa-play"></i> -->
                            </td>
                            
                            <?php $contador++; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<?php require("footer.php"); ?>
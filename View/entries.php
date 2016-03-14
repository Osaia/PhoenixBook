

    <div ID="entriesWrapper" class="col-xs-12 col-ld-12">
        <div id="entries-background" class="col-xs-12 col-ld-12">
            <div class="col-xs-9 col-ld-9">
                 <div class="col-xs-9 col-ld-9 col-md-offset-1" id="entries-container">
                    <?php

                    $model = new Model();
                    $model->tablename = "entrys";
                    $entries = $model->readAll(100);

                    foreach($entries as $entry) {
                        $model->tablename = "user";
                        $user = $model->readById($entry["user_id"]);
                        echo '
                     <div class="entries">
                        <div class="entries-header">
                            <div class="col-xs-1 col-ld-1">
                                <img class="media-object profile-picture" src="'.$user["profilbild"].'" alt="Pic">
                            </div>
                            <div class="col-xs-2 col-ld-2">
                                <h5 class="media-heading">'.$user["username"].'</h5>
                            </div>
                            <div class="col-xs-2 col-ld-2 col-md-offset-7">
                                <p>'.$entry["likes"].'</p>
                                <a href="#"><p><span class="glyphicon glyphicon-heart"></span></p></a>
                            </div>
                        </div>
                        <div class="entries-txt">
                            <p class="txt-hidden">
                                ' . $entry["text"] . '
                            </p>
                            ';
                            if (isset($profilbild)) {
                                echo '<div><img src="'.$entry["bild"].'"></div>';
                            };'
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                 </div>
            <div class="col-xs-3 col-ld-3 sidebar-top">
                <div id="sidebar-big" class="col-xs-10 col-ld-10">
                    <div class="btn-open-sidebar">
                        <button id="open" type="button" class="btn btn-default" aria-label="Left Align">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="col-xs-10 col-ld-10 col-md-offset-1">
                        <form method="get">
                            <textarea class="txtarea" name="txtfeld" placeholder="Text..."></textarea>
                        </form>
                    </div>
                    <div class="col-xs-10 col-ld-10 col-md-offset-1">
                        <form>
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                            </button>
                        </form>
                    </div>
                </div>
                <div id="sidebar-small" class="col-xs-10 col-ld-10">
                    <button id="close" type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php

?>

<?php
if(isset($_SESSION['userid'])){
    echo'
    <div ID="entriesWrapper" class="col-xs-12 col-ld-12">
        <div id="entries-background" class="col-xs-12 col-ld-12">
            <div class="col-xs-9 col-ld-9">
                 <div class="col-xs-9 col-ld-9 col-md-offset-1" id="entries-container">
    ';
    //<?php

//                    echo '<pre>';
//                    var_dump($_SESSION);
//                    echo '</pre>';
    $controller = new entriesController();
    $model = new EntrysModel();
    $entries = $model->show(100);

    foreach($entries as $entry) {
        echo '
                     <div class="entries">
                        <div class="entries-header">
                            <div class="col-xs-1 col-ld-1">
                                <img class="media-object profile-picture" src="'.$entry["profilbild"].'" alt="Pic">
                            </div>
                            <div class="col-xs-2 col-ld-2">
                                <h5 class="media-heading">'.$entry["username"]. '</h5>
                            </div>
                            <div class="col-xs-2 col-ld-2 col-md-offset-7">
                                ';
                                if ($_SESSION['userid'] == $entry['user_id']) {
                                    echo '<a href = "entries/delete?id='.$entry["id"].'" ><p ><span class="glyphicon glyphicon-remove" ></span ></p ></a >';
                                    }
                                echo '
                            </div>
                        </div>
                        <div class="entries-txt">
                            <p class="txt-hidden">
                                ' . $entry["text"] . '
                            </p>
                            ';
        if (isset($profilbild)) {
            echo '<div><img src="'.$entry["bild"].'"></div>';
        };
        echo '
                            </div>
                        </div>';
    };

    echo'
             </div>
            <div class="col-xs-3 col-ld-3 sidebar-top">
                <form method="post" action="entries/create" id="newEntryForm" enctype="multipart/form-data">
                    <div id="sidebar-big" class="col-xs-10 col-ld-10">
                        <div class="btn-open-sidebar">
                            <button id="open" type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="col-xs-10 col-ld-10 col-md-offset-1">
                            <textarea class="txtarea" name="textField" placeholder="Text..."></textarea>
                        </div>
                        <div class="col-xs-10 col-ld-10 col-md-offset-1">
                            <button type="submit" name="uploadText" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </button>
                            <button type="button" name="uploadPicture" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </form>
                <div id="sidebar-small" class="col-xs-10 col-ld-10">
                    <button id="close" type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
';
}else{
    header('Location: /');
}



?>

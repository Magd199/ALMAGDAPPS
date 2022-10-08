<?php
echo '<style>.landingpress-message{padding:12px!important}.landingpress-message-inner{overflow:hidden}.landingpress-message-icon{float:left;width:110px;height:110px;padding-right:20px}.landingpress-message-button{float:right;padding:3px 0 0 20px}.notice,div.errors,div.updated{background:#fff;border:1px solid ghostwhite;border-left-color:rgb(204,208,212);border-left-width:1px;border-left-width:4px;box-shadow:0 1px 1px rgba(0,0,0,.04);padding:1px 12px}.Hide{display:none}.wp-block-table{margin:0 0 1em;overflow-x:auto}.wp-block-table .has-fixed-layout{table-layout:fixed;width:100%}.wp-block-table table{border-collapse:collapse;width:100%}block-table .has-fixed-layout th{word-break:break-word}.wp-block-table .has-fixed-layout td,.wp-block-table .has-fixed-layout th{word-break:break-word}.app-box-info th,.app-box-info td{padding:5px 0}.truncate{display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.has-text-align-right{text-align:right}tr.apkextractor:nth-child(odd){background-color:rgba(0,0,0,.05)}tr.apkextractor:nth-child(even){background-color:transparent}</style>
<div class="errors landingpress-message">
    <div class="landingpress-message-inner">
        <div class="landingpress-message-icon">
            <img src="'.$gets_data['poster_GP'].'" width="90px" height="100px" alt=""/>
        </div>
        <div class="landingpress-message-button">
            <a href="post.php?post=' . $post_id . '&action=edit" class="button button-primary">Edit</a>
						<a href="'.$urlX.'" class="button button-primary">View</a>						 
						<a class="toggle button button-primary">Debugs</a>
        </div>
        <strong>'.$gets_data['title_GP'].' - <i>'.$gets_data['version_GP'].'</i></strong>
        <br>
        <strong>Updates :</strong> <i>'.$gets_data['updates_GP'].'</i>
        <br>
        <strong>Genre :</strong> <i>'.$gets_data['genres_GP'].'</i>
        <br>
        <strong>Developer :</strong> <i>'.$gets_data['developers_GP'].'</i>
        <br>
        <i>'.$gets_data['desck_GP'].'</i>
    </div>
</div>
';
?>
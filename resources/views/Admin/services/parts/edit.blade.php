<form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('services.update',$service->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="icon" class="form-control-label">الايقونة</label>
        <div style="max-height: 250px;overflow-y: scroll;border: 1px solid #d3dfef">
            <div class="col-sm-12 col-lg-12">
                <div class="icons-list-wrap">
                    <ul class="icons-list">
                        <li class="icons-list-item myIcon"><i class="fe fe-activity" title="" data-original-title="fe fe-activity"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-airplay" title="" data-original-title="fe fe-airplay"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-alert-circle" title="" data-original-title="fe fe-alert-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-alert-octagon" title="" data-original-title="fe fe-alert-octagon"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-alert-triangle" title="" data-original-title="fe fe-alert-triangle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-align-center" title="" data-original-title="fe fe-align-center"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-align-justify" title="" data-original-title="fe fe-align-justify"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-align-left" title="" data-original-title="fe fe-align-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-align-right" title="" data-original-title="fe fe-align-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-anchor" title="" data-original-title="fe fe-anchor"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-aperture" title="" data-original-title="fe fe-aperture"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-down" title="" data-original-title="fe fe-arrow-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-down-circle" title="" data-original-title="fe fe-arrow-down-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-down-left" title="" data-original-title="fe fe-arrow-down-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-down-right" title="" data-original-title="fe fe-arrow-down-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-left" title="" data-original-title="fe fe-arrow-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-left-circle" title="" data-original-title="fe fe-arrow-left-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-right" title="" data-original-title="fe fe-arrow-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-right-circle" title="" data-original-title="fe fe-arrow-right-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-up" title="" data-original-title="fe fe-arrow-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-up-circle" title="" data-original-title="fe fe-arrow-up-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-up-left" title="" data-original-title="fe fe-arrow-up-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-arrow-up-right" title="" data-original-title="fe fe-arrow-up-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-at-sign" title="" data-original-title="fe fe-at-sign"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-award" title="" data-original-title="fe fe-award"></i></li>
                        <li class="icons-list-item myIcon"><i class="lnr lnr-pie-chart" title="" data-original-title="lnr lnr-pie-chart"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-battery" title="" data-original-title="fe fe-battery"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-battery-charging" title="" data-original-title="fe fe-battery-charging"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-bell" title="" data-original-title="fe fe-bell"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-bell-off" title="" data-original-title="fe fe-bell-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-bluetooth" title="" data-original-title="fe fe-bluetooth"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-bold" title="" data-original-title="fe fe-bold"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-book" title="" data-original-title="fe fe-book"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-book-open" title="" data-original-title="fe fe-book-open"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-bookmark" title="" data-original-title="fe fe-bookmark"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-box" title="" data-original-title="fe fe-box"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-briefcase" title="" data-original-title="fe fe-briefcase"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-calendar" title="" data-original-title="fe fe-calendar"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-camera" title="" data-original-title="fe fe-camera"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-camera-off" title="" data-original-title="fe fe-camera-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cast" title="" data-original-title="fe fe-cast"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-check" title="" data-original-title="fe fe-check"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-check-circle" title="" data-original-title="fe fe-check-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-check-square" title="" data-original-title="fe fe-check-square"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevron-down" title="" data-original-title="fe fe-chevron-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevron-left" title="" data-original-title="fe fe-chevron-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevron-right" title="" data-original-title="fe fe-chevron-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevron-up" title="" data-original-title="fe fe-chevron-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevrons-down" title="" data-original-title="fe fe-chevrons-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevrons-left" title="" data-original-title="fe fe-chevrons-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevrons-right" title="" data-original-title="fe fe-chevrons-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chevrons-up" title="" data-original-title="fe fe-chevrons-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-chrome" title="" data-original-title="fe fe-chrome"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-circle" title="" data-original-title="fe fe-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-clipboard" title="" data-original-title="fe fe-clipboard"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-clock" title="" data-original-title="fe fe-clock"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cloud" title="" data-original-title="fe fe-cloud"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cloud-drizzle" title="" data-original-title="fe fe-cloud-drizzle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cloud-lightning" title="" data-original-title="fe fe-cloud-lightning"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cloud-off" title="" data-original-title="fe fe-cloud-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cloud-rain" title="" data-original-title="fe fe-cloud-rain"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cloud-snow" title="" data-original-title="fe fe-cloud-snow"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-code" title="" data-original-title="fe fe-code"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-codepen" title="" data-original-title="fe fe-codepen"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-command" title="" data-original-title="fe fe-command"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-compass" title="" data-original-title="fe fe-compass"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-copy" title="" data-original-title="fe fe-copy"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-down-left" title="" data-original-title="fe fe-corner-down-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-down-right" title="" data-original-title="fe fe-corner-down-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-left-down" title="" data-original-title="fe fe-corner-left-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-left-up" title="" data-original-title="fe fe-corner-left-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-right-down" title="" data-original-title="fe fe-corner-right-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-right-up" title="" data-original-title="fe fe-corner-right-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-up-left" title="" data-original-title="fe fe-corner-up-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-corner-up-right" title="" data-original-title="fe fe-corner-up-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-cpu" title="" data-original-title="fe fe-cpu"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-credit-card" title="" data-original-title="fe fe-credit-card"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-crop" title="" data-original-title="fe fe-crop"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-crosshair" title="" data-original-title="fe fe-crosshair"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-database" title="" data-original-title="fe fe-database"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-delete" title="" data-original-title="fe fe-delete"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-disc" title="" data-original-title="fe fe-disc"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-dollar-sign" title="" data-original-title="fe fe-dollar-sign"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-download" title="" data-original-title="fe fe-download"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-download-cloud" title="" data-original-title="fe fe-download-cloud"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-droplet" title="" data-original-title="fe fe-droplet"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-edit" title="" data-original-title="fe fe-edit"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-edit-2" title="" data-original-title="fe fe-edit-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-edit-3" title="" data-original-title="fe fe-edit-3"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-external-link" title="" data-original-title="fe fe-external-link"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-eye" title="" data-original-title="fe fe-eye"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-eye-off" title="" data-original-title="fe fe-eye-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-facebook" title="" data-original-title="fe fe-facebook"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-fast-forward" title="" data-original-title="fe fe-fast-forward"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-feather" title="" data-original-title="fe fe-feather"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-file" title="" data-original-title="fe fe-file"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-file-minus" title="" data-original-title="fe fe-file-minus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-file-plus" title="" data-original-title="fe fe-file-plus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-file-text" title="" data-original-title="fe fe-file-text"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-film" title="" data-original-title="fe fe-film"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-filter" title="" data-original-title="fe fe-filter"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-flag" title="" data-original-title="fe fe-flag"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-folder" title="" data-original-title="fe fe-folder"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-folder-minus" title="" data-original-title="fe fe-folder-minus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-folder-plus" title="" data-original-title="fe fe-folder-plus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-git-branch" title="" data-original-title="fe fe-git-branch"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-git-commit" title="" data-original-title="fe fe-git-commit"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-git-merge" title="" data-original-title="fe fe-git-merge"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-git-pull-request" title="" data-original-title="fe fe-git-pull-request"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-github" title="" data-original-title="fe fe-github"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-gitlab" title="" data-original-title="fe fe-gitlab"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-globe" title="" data-original-title="fe fe-globe"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-grid" title="" data-original-title="fe fe-grid"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-hard-drive" title="" data-original-title="fe fe-hard-drive"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-hash" title="" data-original-title="fe fe-hash"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-headphones" title="" data-original-title="fe fe-headphones"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-heart" title="" data-original-title="fe fe-heart"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-help-circle" title="" data-original-title="fe fe-help-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-home" title="" data-original-title="fe fe-home"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-image" title="" data-original-title="fe fe-image"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-inbox" title="" data-original-title="fe fe-inbox"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-info" title="" data-original-title="fe fe-info"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-instagram" title="" data-original-title="fe fe-instagram"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-italic" title="" data-original-title="fe fe-italic"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-layers" title="" data-original-title="fe fe-layers"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-layout" title="" data-original-title="fe fe-layout"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-life-buoy" title="" data-original-title="fe fe-life-buoy"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-link" title="" data-original-title="fe fe-link"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-link-2" title="" data-original-title="fe fe-link-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-linkedin" title="" data-original-title="fe fe-linkedin"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-list" title="" data-original-title="fe fe-list"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-loader" title="" data-original-title="fe fe-loader"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-lock" title="" data-original-title="fe fe-lock"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-log-in" title="" data-original-title="fe fe-log-in"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-log-out" title="" data-original-title="fe fe-log-out"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-mail" title="" data-original-title="fe fe-mail"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-map" title="" data-original-title="fe fe-map"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-map-pin" title="" data-original-title="fe fe-map-pin"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-maximize" title="" data-original-title="fe fe-maximize"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-maximize-2" title="" data-original-title="fe fe-maximize-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-menu" title="" data-original-title="fe fe-menu"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-message-circle" title="" data-original-title="fe fe-message-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-message-square" title="" data-original-title="fe fe-message-square"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-mic" title="" data-original-title="fe fe-mic"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-mic-off" title="" data-original-title="fe fe-mic-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-minimize" title="" data-original-title="fe fe-minimize"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-minimize-2" title="" data-original-title="fe fe-minimize-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-minus" title="" data-original-title="fe fe-minus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-minus-circle" title="" data-original-title="fe fe-minus-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-minus-square" title="" data-original-title="fe fe-minus-square"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-monitor" title="" data-original-title="fe fe-monitor"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-moon" title="" data-original-title="fe fe-moon"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-more-horizontal" title="" data-original-title="fe fe-more-horizontal"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-more-vertical" title="" data-original-title="fe fe-more-vertical"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-move" title="" data-original-title="fe fe-move"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-music" title="" data-original-title="fe fe-music"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-navigation" title="" data-original-title="fe fe-navigation"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-navigation-2" title="" data-original-title="fe fe-navigation-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-octagon" title="" data-original-title="fe fe-octagon"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-package" title="" data-original-title="fe fe-package"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-paperclip" title="" data-original-title="fe fe-paperclip"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-pause" title="" data-original-title="fe fe-pause"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-pause-circle" title="" data-original-title="fe fe-pause-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-percent" title="" data-original-title="fe fe-percent"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone" title="" data-original-title="fe fe-phone"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone-call" title="" data-original-title="fe fe-phone-call"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone-forwarded" title="" data-original-title="fe fe-phone-forwarded"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone-incoming" title="" data-original-title="fe fe-phone-incoming"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone-missed" title="" data-original-title="fe fe-phone-missed"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone-off" title="" data-original-title="fe fe-phone-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-phone-outgoing" title="" data-original-title="fe fe-phone-outgoing"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-pie-chart" title="" data-original-title="fe fe-pie-chart"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-play" title="" data-original-title="fe fe-play"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-play-circle" title="" data-original-title="fe fe-play-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-plus" title="" data-original-title="fe fe-plus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-plus-circle" title="" data-original-title="fe fe-plus-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-plus-square" title="" data-original-title="fe fe-plus-square"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-pocket" title="" data-original-title="fe fe-pocket"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-power" title="" data-original-title="fe fe-power"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-printer" title="" data-original-title="fe fe-printer"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-radio" title="" data-original-title="fe fe-radio"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-refresh-ccw" title="" data-original-title="fe fe-refresh-ccw"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-refresh-cw" title="" data-original-title="fe fe-refresh-cw"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-repeat" title="" data-original-title="fe fe-repeat"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-rewind" title="" data-original-title="fe fe-rewind"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-rotate-ccw" title="" data-original-title="fe fe-rotate-ccw"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-rotate-cw" title="" data-original-title="fe fe-rotate-cw"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-rss" title="" data-original-title="fe fe-rss"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-save" title="" data-original-title="fe fe-save"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-scissors" title="" data-original-title="fe fe-scissors"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-search" title="" data-original-title="fe fe-search"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-send" title="" data-original-title="fe fe-send"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-server" title="" data-original-title="fe fe-server"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-settings" title="" data-original-title="fe fe-settings"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-share" title="" data-original-title="fe fe-share"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-share-2" title="" data-original-title="fe fe-share-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-shield" title="" data-original-title="fe fe-shield"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-shield-off" title="" data-original-title="fe fe-shield-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-shopping-bag" title="" data-original-title="fe fe-shopping-bag"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-shopping-cart" title="" data-original-title="fe fe-shopping-cart"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-shuffle" title="" data-original-title="fe fe-shuffle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-sidebar" title="" data-original-title="fe fe-sidebar"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-skip-back" title="" data-original-title="fe fe-skip-back"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-skip-forward" title="" data-original-title="fe fe-skip-forward"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-slack" title="" data-original-title="fe fe-slack"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-slash" title="" data-original-title="fe fe-slash"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-sliders" title="" data-original-title="fe fe-sliders"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-smartphone" title="" data-original-title="fe fe-smartphone"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-speaker" title="" data-original-title="fe fe-speaker"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-square" title="" data-original-title="fe fe-square"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-star" title="" data-original-title="fe fe-star"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-stop-circle" title="" data-original-title="fe fe-stop-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-sun" title="" data-original-title="fe fe-sun"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-sunrise" title="" data-original-title="fe fe-sunrise"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-sunset" title="" data-original-title="fe fe-sunset"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-tablet" title="" data-original-title="fe fe-tablet"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-tag" title="" data-original-title="fe fe-tag"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-target" title="" data-original-title="fe fe-target"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-terminal" title="" data-original-title="fe fe-terminal"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-thermometer" title="" data-original-title="fe fe-thermometer"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-thumbs-down" title="" data-original-title="fe fe-thumbs-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-thumbs-up" title="" data-original-title="fe fe-thumbs-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-toggle-left" title="" data-original-title="fe fe-toggle-left"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-toggle-right" title="" data-original-title="fe fe-toggle-right"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-trash" title="" data-original-title="fe fe-trash"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-trash-2" title="" data-original-title="fe fe-trash-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-trending-down" title="" data-original-title="fe fe-trending-down"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-trending-up" title="" data-original-title="fe fe-trending-up"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-triangle" title="" data-original-title="fe fe-triangle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-truck" title="" data-original-title="fe fe-truck"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-tv" title="" data-original-title="fe fe-tv"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-twitter" title="" data-original-title="fe fe-twitter"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-type" title="" data-original-title="fe fe-type"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-umbrella" title="" data-original-title="fe fe-umbrella"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-underline" title="" data-original-title="fe fe-underline"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-unlock" title="" data-original-title="fe fe-unlock"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-upload" title="" data-original-title="fe fe-upload"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-upload-cloud" title="" data-original-title="fe fe-upload-cloud"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-user" title="" data-original-title="fe fe-user"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-user-check" title="" data-original-title="fe fe-user-check"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-user-minus" title="" data-original-title="fe fe-user-minus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-user-plus" title="" data-original-title="fe fe-user-plus"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-user-x" title="" data-original-title="fe fe-user-x"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-users" title="" data-original-title="fe fe-users"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-video" title="" data-original-title="fe fe-video"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-video-off" title="" data-original-title="fe fe-video-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-voicemail" title="" data-original-title="fe fe-voicemail"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-volume" title="" data-original-title="fe fe-volume"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-volume-1" title="" data-original-title="fe fe-volume-1"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-volume-2" title="" data-original-title="fe fe-volume-2"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-volume-x" title="" data-original-title="fe fe-volume-x"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-watch" title="" data-original-title="fe fe-watch"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-wifi" title="" data-original-title="fe fe-wifi"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-wifi-off" title="" data-original-title="fe fe-wifi-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-wind" title="" data-original-title="fe fe-wind"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-x" title="" data-original-title="fe fe-x"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-x-circle" title="" data-original-title="fe fe-x-circle"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-x-square" title="" data-original-title="fe fe-x-square"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-zap" title="" data-original-title="fe fe-zap"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-zap-off" title="" data-original-title="fe fe-zap-off"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-zoom-in" title="" data-original-title="fe fe-zoom-in"></i></li>
                        <li class="icons-list-item myIcon"><i class="fe fe-zoom-out" title="" data-original-title="fe fe-zoom-out"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <input type="hidden" value="{{$service->icon}}" id="iconInput" name="icon">
    </div>
    <input type="hidden" value="{{$service->id}}" name="id">

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="title_ar" class="form-control-label">العنوان (ar)</label>
                <input type="text" class="form-control" name="title_ar" value="{{$service->title_ar}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="title_en" class="form-control-label">العنوان (en)</label>
                <input type="text" class="form-control" name="title_en"  value="{{$service->title_en}}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="desc_ar" class="form-control-label">وصف الخدمة (ar)</label>
                <textarea rows="3" class="form-control" name="desc_ar" placeholder="شرح ووصف ما يتم توفيره في الخدمة باللغة العربية">{{$service->desc_ar}}</textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="desc_en" class="form-control-label">وصف الخدمة (en)</label>
                <textarea rows="3" class="form-control" name="desc_en" placeholder="شرح ووصف ما يتم توفيره في الخدمة باللغة الانجليزية">{{$service->desc_en}}</textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-success" id="updateButton">تعديل</button>
    </div>
</form>
<script>
    $('.myIcon').on('click',function (){
        var theIcon = $(this).children();
        $('#iconInput').val(theIcon.attr('data-original-title'))
        $('.myIcon').removeClass('badge badge-success')
        $(this).addClass('badge badge-success')
    });

    // to check old input
    var oldIcon   = "{{$service->icon}}",
        className = oldIcon.replace('fe ','');
    $(".myIcon ."+className).parent().addClass('badge badge-success');
</script>


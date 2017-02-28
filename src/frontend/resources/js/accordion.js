$(document).ready(function(){
    var url = document.location.href;
    var idx = url.indexOf("#");
    var hash = idx != -1 ? url.substring(idx+1) : "";

    if (hash != "") {
        // Check checkbox or radio button that has id equal to url hash
        $('#' + hash + '.accordion__item .accordion__input').prop("checked", true);

        // After opening accordion, jump to accordion (as position has changed
        // after opening the accordion in the previous step)
        location.href = "#" + hash;
    }
});
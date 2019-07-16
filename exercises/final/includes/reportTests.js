$(document).ready(function() {
    var qs = new URLSearchParams(window.location.search), form = qs.get("form"),
        Head = document.getElementsByClassName('h1'),
        formData = document.getElementById('formData');
    switch (form) {
        case '1':
            Head[0].innerHTML = "לחץ&nbsp;דם";
            formData.innerHTML += '<div class="row"><div class="col"><input class="form-control" type="number" name="bloodPressureS"min="100" max="180" placeholder="סיסטולי"></div>' +
                '<div class="col"><input class="form-control" type="number" name="bloodPressureD"min="80" max="120" placeholder="דיאסטולי"></div></div><input type="hidden" name="formId" value="1">';
            break;
        case '2':
            Head[0].innerHTML = "סוכר";
            formData.innerHTML += '<input class="form-control" type="number" name="sugar" min="80" placeholder="ערכי הבדיקה" max="200"><input type="hidden" name="formId" value="2">';
            break;
        case '3':
            Head[0].innerHTML = "דופק";
            formData.innerHTML += '<input class="form-control" type="number" name="heartBeat" min="40" max="150"  placeholder="ערכי הבדיקה"><input type="hidden" name="formId" value="3">';
            break;
        case '4':
            Head[0].innerHTML = "סטורציה";
            formData.innerHTML += '<input class="form-control" type="number" name="saturation" min="70" max="110"  placeholder="ערכי הבדיקה"><input type="hidden" name="formId" value="4">';
            break;
        default:
            break;
    }
})
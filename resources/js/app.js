require('./bootstrap');
require('./vendor/jquery.blockUI.min')

let blockForm = function() {
    $('.checking-url').block({
        message: '<h3>جاري تحليل الفيديو</h3>'
    })
}

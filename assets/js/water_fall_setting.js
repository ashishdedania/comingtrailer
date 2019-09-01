window.addEventListener('DOMContentLoaded', function (e) {
    if ($('div.wf-container').length > 0) {
        var waterfall = new Waterfall({minBoxWidth: 300});
    }
    if ($('div.wf-container1').length > 0) {
        var waterfall1 = new Waterfall({minBoxWidth: 300, containerSelector: '.wf-container1'});
    }
    if ($('div.wf-container2').length > 0) {
        var waterfall2 = new Waterfall({minBoxWidth: 300, containerSelector: '.wf-container2'});
    }
});
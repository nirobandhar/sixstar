$(document).ready(function () {
    $(".chzn-select").chosen();
	$('select').chosen({search_contains:true}) ;
    $(".chzn-select-deselect").chosen({ allow_single_deselect: true });
});
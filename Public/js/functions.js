var cm_app_index = '/TheWayShop/Public/index.php';
var loadItemImg = function(event) {
	var reader = new FileReader();
	reader.onload = function() {
		var output = document.getElementById('ItemImg');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};

function nFormat(number)
{
	number = parseFloat(Math.round(number * 100) / 100).toFixed(2);
	return (""+number).replace(/\B(?=(?:\d{3})+(?!\d))/g," ");
}

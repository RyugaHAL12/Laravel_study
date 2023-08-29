$(function(){
	$('#btn').on('click',function(){
		$.ajax({
			url:"http://zipcloud.ibsnet.co.jp/api/search?zipcode=" +  $('#zipcode').val(),
			dataType:'jsonp',
		}).done(function(data){
			setAddressData(data.results[0]);
		}).fail(function(data){
			alert('通信に失敗しました');
		});
	});
});

function setAddressData(data){
	//	取得してきたデータを各HTML要素の中に格納
	$('#prefecture').val(data.address1);	//	都道府県
	$('#city').val(data.address2);			//	市区町村
	$('#address').val(data.address3);		//	町域
};
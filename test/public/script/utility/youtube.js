//	APIkey
let apiKey = 'AIzaSyDSVoM6gZMf-9GIwW4Cgz_c2GAt8wontOg';

//	Youtubeデータ取得用関数
function getMovieData(){
	$searchKeyword = $('#searchKeyword').val();
	let apiURL = 'https://www.googleapis.com/youtube/v3/search?';
	apiURL += 'type=video';				//	動画を検索
	apiURL += '&part=snippet';			//	検索結果にすべてのプロパティを含む
	apiURL += '&q=' + $searchKeyword;	//	検索ワード
	apiURL += '&videoEmbeddable=true';	//	Webページに埋め込み可能な動画のみを検索
	apiURL += '&videoSyndicated=true';	//	youtube.com以外でも再生できる動画のみを絞り込み
	apiURL += '&maxResults=6';			//	動画の最大取得数
	apiURL += '&key=' + apiKey;			//	APIキー

			//	Youtubeの動画を検索して取得
			$.ajax({
				url:apiURL,
				dataType:'jsonp',
			}).done(function(data){
				if(data.items){
					setData(data);
				}else{
					console.log(data);
					alert('該当するデータを取得することができませんでした')
				}
			}).fail(function(data){
				alert('通信に失敗しました');
			});
		
			console.log(apiURL);
			return 0;
}

function setData(data){
	let result = '';
	let video = '';

	//	動画を表示するHTMLを作る
	for(let i = 0; i < data.items.length; ++i){
		video = '<iframe src="https://www.youtube.com/embed/';
		video += data.items[i].id.videoId;
		video += '"allowfullscreen></iframe>';
		result += '<div class="video">' + video + '</div>';
	}

	//	HTMLに反映させる
	$('#videoList').html(result);
}

$(function(){
	$('#searchKeyword').keypress(function(e){
		if(e.code == 'Enter'){
			getMovieData();
		}
	});

	$('#searchBtn').click(getMovieData);
})

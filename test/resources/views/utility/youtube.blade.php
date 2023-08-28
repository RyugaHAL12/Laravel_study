@push('videogallerycss')
<link rel="stylesheet" href="css/utility/youtube.css">	
@endpush
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('VideoGallery') }}
        </h2>
    </x-slot>

	<div id="videogallery" style="text-align:center; padding-top: 20px;">
		<input type="text" id="searchKeyword">
		<button id="searchBtn">検索</button>
		<div id="videoList">
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.0.min.js" 
	integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
	crossorigin="anonymous"></script>
	<script src="/script/utility/youtube.js"></script>

</x-app-layout>

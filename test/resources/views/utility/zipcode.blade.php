<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Zipcode') }}
        </h2>
    </x-slot>

	<div style="color:white; text-align:center;">
		<p>
			<label>郵便番号
				<input id="zipcode" type="text" size="10" maxlength="8" style="color:black;">
				<button id="btn">検索</button>
			</label>
		</p>
		<p>
			<label>都道府県
				<input id="prefecture" type="text" size="10" style="color:black;">
			</label>
		</p>
		<p>
			<label>市区町村
				<input id="city" type="text" size="20" style="color:black;">
			</label>
		</p>
		<p>
			<label>住所
				<input id="address" type="text" size="20" style="color:black;">
			</label>
		</p>
	</div>
	<script src="/script/utility/zipcode.js"></script>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
	<div class="max-w-7x1 mx-auto px-6">
		@if(session('message'))
			<div class="text-white font-bold">
				{{session('message')}}
			</div>
		@endif
	</div>

	<div class="max-w-7xl mx-auto px-6">
		<form method="POST" action="{{route('post.store')}}">
			@csrf
			<div class="mt-8"> 
				<div class="w-full flex flex-col">
					<label for="title" class="font-semibold mt-4 text-white">Title</label>
					<x-input-error :messages="$errors->get('title')" class="mt-2 text-white" />
						<input type="text" name="title" 
						class="w-auto py-2 bg-gray-500 border border-white rounded-md text-white" id="title"
						value="{{old('title')}}">
					</div>
				</div>
				
				<div class="w-full flex flex-col">
					<label for="body" class="font-semibold mt-4 text-white">Content</label>
					<x-input-error :messages="$errors->get('body')" class="mt-2 text-white" />
				<textarea name="body" class="w-auto py-2 bg-gray-500 border border-white rounded-md text-white" 
				id="body" cols="30" rows="5">{{old('body')}}</textarea>
			</div>

			<x-primary-button class="mt-4">送信する</x-primary-button>
		</form>
	</div>
</x-app-layout>

@extends('back-end.app')
@section('title')
<title>
    Sửa chủ đề kiến nghị
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Chủ đề kiến nghị','key'=>' | Chỉnh sửa'])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    
   <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('petitionTag.update',['id'=>$petitionTag->id_tag])}}" enctype="multipart/form-data" >
    @csrf
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" >
            Tiêu đề
            <span class="text-red-500 text-base">*</span>
        </label>
        <input value="{{$petitionTag->name}}" name="title"  class="@error('title') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bankName" name="bankName" type="text" placeholder="Nhập tiêu đề">
        </div>

        <div class="mb-4">
            @error('title')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{$message}}</strong>
    
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @enderror
        </div>
        
        <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Chỉnh sửa
        </button>
        
        </div>
    </form>    
</div>
@endsection
 
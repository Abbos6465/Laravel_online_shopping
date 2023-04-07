<x-layouts.app>
    <x-slot:title>
        {{__("Update product")}}
        </x-slot>
        <div class="container">
            <div class="row mx-auto">
                <div class="col-lg-9  mb-5 mb-lg-0 mx-auto">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Create Post Form -->
                    <div class="w-100 p-5 card m-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4> <span class="text-success fs-3">{{__("Category")}}</span>: {{$product->category->name}}</h4>
                            <h4> <span class="text-success fs-3">Brand</span>: {{$product->brand->name}}</h4>

                        </div>
                        <form action="{{route('product.update',['product'=>$product->id])}}" method="POST" class="mt-5" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="category_id" value="{{$category_id ?? $product->category_id}}">
                            <input type="hidden" name="brand_id" value="{{$brand_id ?? $product->brand_id}}">
                            <input type="text" required name="title" class="form-control" value="{{$product->title ?? old('title')}}" placeholder="{{__('Title')}}">
                            <input type="number" min="0" required class="form-control mt-3" value="{{$product->price}}" placeholder="{{__('Price')}}" name="price">
                            <textarea class="form-control mt-3" required name="content" style="height: 100px">{{$product->content}}</textarea>
                            <input type="file" name="photo" class="form-control mt-3">
                            <button class="btn btn-success w-75 mx-auto mt-4 d-block" type="submit">{{__("Submit")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-layouts.app>
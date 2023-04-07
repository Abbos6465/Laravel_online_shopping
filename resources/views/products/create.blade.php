<x-layouts.app>
    <x-slot:title>
        {{__("Create product")}}
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
                        @isset($brand_id)
                        <h2 class="text-success text-center">{{__("Category and brand add successfully")}}</h2>

                        @else
                        <h2 class="text-danger text-center">{{__("Category or brand  not added")}}</h2>
                        @endisset
                        <div class="d-flex gap-2 align-items-center">
                            <!-- Kamchiligi  bor-->
                            @foreach ($categories as $category)
                            <div class="btn-group d-inline">
                                <button required type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__($category->name)}}
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach ($category->brands as $brand)
                                    <li><a class="dropdown-item" href="{{route('getBrand',[$brand->id])}}">{{$brand->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>

                        <form action="{{route('product.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
                            @csrf
                            @isset($brand_id)
                            <input type="hidden" name="category_id" value="{{$category_id}}">
                            <input type="hidden" name="brand_id" value="{{$brand_id}}">
                            @endisset
                            <input type="text" required name="title" class="form-control" placeholder="{{__('Title')}}">
                            <input type="number" min="0" required class="form-control mt-3" placeholder="{{__('Price')}}" name="price">
                            <textarea class="form-control mt-3" required name="content" style="height: 100px"></textarea>
                            <input type="file" name="photo" class="form-control mt-3">
                            <button class="btn btn-success w-75 mx-auto mt-4 d-block" type="submit">{{__("Submit")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-layouts.app>
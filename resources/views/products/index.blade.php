<x-layouts.app>
    <x-slot:title>
        {{__("All products")}}
        </x-slot>
        <div class="container-fluid py-5">
            <div class="container">
                @if (session('success'))
                <div class="alert alert-success mb-5" role="alert">
                    <h2 class="text-center text-success">{{__("Product created successfully")}}</h2>
                </div>
                @endif

                <div class="row align-items-end mb-4">
                    <div class="col-lg-6">
                        <h1 class="section-title mb-3">{{__("All products")}}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-center">
                            @foreach ($products as $product)
                                <a href="{{route('product.show',[$product->id])}}" class="text-decoration-none">
                                <div class="card index-card" style="width: 20rem;">
                                <img src="{{asset('storage/'. $product->photo)}}" class="card-img-top index-img" alt="product photo" width="200" height="100">
                                <div class="card-body position-relative">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="text-warning">{{$product->brand->name}}</h5>
                                        <h5 class="text-warning">{{__($product->category->name)}}</h5>
                                    </div>
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <h5 class="card-text position-absolute bottom-0 mb-3">{{$product->price}} y.e</h5>
                                </div>
                            </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mx-auto d-flex justify-content-center">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
</x-layouts.app>
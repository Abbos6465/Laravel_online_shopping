<x-layouts.app>
    <x-slot:title>
        {{$product->title}}
        </x-slot>

        <div class="container pt-5">
          @canany(['update','delete'], $product)
          <div class="d-flex justify-content-end gap-2 mb-3">
                <a href="{{route('product.edit',['product'=>$product->id])}}" class="btn btn-warning">{{__("Update")}}</a>
                <form action="{{route('product.destroy',['product'=>$product->id])}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">{{__("Delete")}}</button>
                </form>
            </div>
          @endcanany
            <div>
                <img src="{{asset('storage/'.$product->photo)}}" alt="default img" width="1000">
                <div class="mt-5 d-flex align-items-center justify-content-between">
                    <h2>{{$product->title}}</h2>
                    <h2 class="text-secondary">{{$product->brand->name}}</h2>
                </div>
                <h1>{{$product->price}} y.e</h1>
                <p>
                    {{$product->content}}
                </p>
            </div>

        </div>

</x-layouts.app>
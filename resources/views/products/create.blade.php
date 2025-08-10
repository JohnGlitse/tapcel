<x-layout>
    <div class="create">
        <h1>Create New Product</h1>
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="product-row">
                <div>
                    <label for="title">Product Title</label>
                    <input type="text" name="title" value="{{old('title')}}">
                    @error('title')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="price">Product Price</label>
                    <input type="number" name="price" value="{{old('price')}}">
                    @error('price')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="product-row">
                <div>
                    <label for="brand">Product Brand</label>
                    <input type="text" name="brand" value="{{old('brand')}}">
                    @error('brand')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label for="file">Product Image</label>
                    <input type="file" name="file" value="{{old('file')}}">
                    @error('file')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
            </div>
                
            <div class="product-row">
                 <div>
                    <label for="description">Product Description</label>
                    <textarea name="description" cols="30" rows="4">{{old('description')}}</textarea>
                    @error('description')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
                <div>
                   <div class="button"> <button>Create</button></div>
                </div>
            </div>
        </form>

    </div>
</x-layout>
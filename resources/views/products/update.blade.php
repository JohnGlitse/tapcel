<x-layout>
    <div class="create">
        <h1>Update Product</h1>
        <form action="{{route('product.update', $product)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="product-row">
                <div>
                    <label for="title">Product Title</label>
                    <input type="text" name="title" value="{{$product->title}}">
                    @error('title')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="price">Product Price</label>
                    <input type="number" name="price" value="{{$product->price}}">
                    @error('price')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="product-row">
                <div>
                    <label for="brand">Product Brand</label>
                    <input type="text" name="brand" value="{{$product->brand}}">
                    @error('brand')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>

                 <div>
                    <label for="file">Product Image</label>
                    <img src="{{asset('storage/' . $product->file)}}" width="80px">
                    <input type="file" name="file" >
                    @error('file')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>

            </div>
                
            <div class="product-row">
                 <div>
                    <label for="description">Product Description</label>
                    <textarea name="description" cols="30" rows="4">{{$product->description}}</textarea>
                    @error('description')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
               
                <div>
                   <div class="button"> <button>Update</button></div>
                </div>
            </div>
        </form>

    </div>
</x-layout>
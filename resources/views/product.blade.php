<x-app-layout>

<main>
    <section id="products">
        <div class="container mt-5">
            <h2 class="text-center">نمایش محصول</h2>
            <div class="row align-items-center">
                
              
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="{{ asset('/storage/'.$product->product_image) }}" class="img-fluid" alt="Product Image" style="border-radius: 10px; width: 400px;height: 500px;">
        </div>
        <div class="col-md-6 mt-4">
            <h2 class="product-title mt-3">{{ $product->product_name }}</h2>
            <p class="product-price mt-3">قیمت:  {{ $product->product_price }} تومان</p>
            <p class="product-description mt-3">{{ $product->product_detail }}</p>
            <a href="{{route('store',[$product->product_id])  }} "><button class="btn btn-primary mt-3">خرید</button></a>
            
            
        </div>
    </div>
</div>
                <?php
                
                ?>
            </div>
        </div>
    </section>

    
</main>




</x-app-layout>

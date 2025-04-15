<x-app-layout>

<div class="container mt-5">
    <h2 class="text-center">لیست سبد خرید شما</h2>
    <div class="row">
    <div class="col-md-12">
                       <!-- Default Table -->
                       <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">image</th>

                    <th scope="col">Name</th>


                    <th scope="col">price</th>
                    <th scope="col">qty</th>
                  </tr>
                </thead>
                @php
                    $priceAll = 0;
                @endphp
                @foreach ($listOrder as $order)
                <tbody>

                          <tr class="text-center">




                          <td><img src="{{asset('storage/'. $order->Product->product_image) }}" class="card-img-top" alt="#" style="width: 100px; height: 50px; object-fit: cover;">
                            <td>{{$order->Product->product_name}}</td>


                            <td>{{$order->Product->product_price}}</td>
                            <td><a href="{{ route('store',[$order->Product->product_id]) }}">
                              <button class="btn btn-primary mt-3">+</button></a>
                                {{ $order->quantity }}
            <a href="{{ route('delete',[$order->item_id]) }}"><button class="btn btn-primary mt-3">-</button></a></td>



                        </tbody>
                        @php
                    $priceAll += $order->Product->product_price *$order->quantity;
                @endphp
@endforeach
                      </table> <br>
                      <form action="copon_check.php" method="post">

                      <label for="copon">کد تخفیف :</label>
                        <input type="text" name="copon_code" class="form-control mt-2" placeholder="کد تخفیف " required>
                      <input type="submit" class="btn-primary btn mt-2" value="ثبت">
                      </form>

                      <br>
                      <table class="table table-bordered">
                <thead>
                  <h1>فاکتور</h1>
                  <tr>
                    <th scope="col">مبلغ کل</th>

                    <th scope="col">تخفیف</th>


                    <th scope="col">مبلغ قابل پرداخت</th>

                  </tr>
                </thead>
                <tbody>




                          <tr class="text-center">


                          <td>{{ $priceAll }} </td>


                            <td>


                            </td>
                            <td>

                                {{ $priceAll }}

                             </td>
                        </tbody>

                      </table>


        </div>
    </div>
</div>





</x-app-layout>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết sản phẩm</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3 text-center">Giỏ hàng</h1>

    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Giá thường</th>
                    <th>Giá sale</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                </tr>

                @if(session()->has('cart'))
                    @foreach(session('cart') as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price_regular'] }}</td>
                            <td>{{ $item['price_sale'] }}</td>
                            <td>{{ $item['color']['name'] }}</td>
                            <td>{{ $item['size']['name'] }}</td>
                            <td>
                                {{-- Nút giảm--}}
                                {{ $item['quantity'] }}
                                {{-- Nút tăng --}}
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
        <div class="col-md-4">
            <h2>Tổng tiền: {{ number_format($totalAmount) }}</h2>
            <form action="{{ route('order.save') }}" method="post">
                @csrf
                <div class="mt-3 mb-2">
                    <label
                        for="user_name"> {{ \Str::convertCase('user_name', MB_CASE_TITLE) }}</label>
                    <input type="text" name="user_name" id="user_name" value="{{ auth()->user()?->name }}">
                </div>
                <div class="mt-3 mb-2">
                    <label
                        for="user_email"> {{ \Str::convertCase('user_email', MB_CASE_TITLE) }}</label>
                    <input type="text" name="user_email" id="user_email" value="{{ auth()->user()?->emai }}">
                </div>
                <div class="mt-3 mb-2">
                    <label
                        for="user_phone"> {{ \Str::convertCase('user_phone', MB_CASE_TITLE) }}</label>
                    <input type="text" name="user_phone" id="user_phone">
                </div>
                <div class="mt-3 mb-2">
                    <label
                        for="user_address"> {{ \Str::convertCase('user_address', MB_CASE_TITLE) }}</label>
                    <input type="text" name="user_address" id="user_address">
                </div>
                <button class="btn btn-primary" type="submit">Đặt hàng</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

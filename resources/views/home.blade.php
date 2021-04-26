@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <form class="form-inline" action="{{route('set')}}" method="post">
            @csrf
            <button class="btn btn-outline-success" type="submit">Создать данные</button>
        </form>
    </nav>
    <div class="container" >
        @foreach($menu as $id => $m)
            <div  class="alert bg-primary cur menu0" onclick="viewBox({{$id}})">
               {{$names[$id]}}
            </div>
            <div class="box{{$id}}" style="display: none;">
                @foreach($m as $id2 => $c)
                    <div  class="alert bg-success cur menu1" onclick="viewBox({{$id2}})">
                        {{$names[$id2]}}
                    </div>
                    <div class="box{{$id2}}" style="display: none;">
                        @foreach($c as $cc)
                            <div class="alert bg-warning menu2">
                                 {{$cc['name_category']}}
                            </div>
                                @foreach($products[$cc['id']] as $product)
                                    <div  class="alert alert-warning cur product2" onclick="getProductJson({{$product['id']}})">
                                       {{$product['name_product']}}
                                    </div>
                                <div class="boxProductTextarea{{$product['id']}} product2"></div>
                                @endforeach
                        @endforeach

                        @foreach($products[$id2] as $product)
                            <div  class="alert alert-success cur product1" onclick="getProductJson({{$product['id']}})">
                               {{$product['name_product']}}
                            </div>
                            <div class="boxProductTextarea{{$product['id']}} product1"></div>
                        @endforeach
                    </div>
                @endforeach

                @foreach($products[$id] as $product)
                    <div  class="alert alert-primary product0 cur" onclick="getProductJson({{$product['id']}})">
                        {{$product['name_product']}}
                    </div>
                    <div class="boxProductTextarea{{$product['id']}} product0"></div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

<script>
    function getProductJson(id) {
        $.ajax({
            type: "POST",
            url: "/ajax/getJson",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            }
        })
            .done(function (report) {
                $('.boxProductTextarea' + id).html('<textarea class="form-control" style="margin-bottom: 25px;">'+report+'</textarea>');
            });
    }

    function viewBox(id) {
        $('.box'+id).show();
    }
</script>

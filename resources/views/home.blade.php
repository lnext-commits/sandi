@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <form class="form-inline" action="{{route('set')}}" method="post">
            @csrf
            <button class="btn btn-outline-success" type="submit">Создать данные</button>
        </form>
        <form class="form-inline" action="{{route('clean')}}" method="post">
            @csrf
            <button class="btn btn-sm align-middle btn-outline-secondary" type="submit">Очистить данные</button>
        </form>
    </nav>
    <div class="accordion" id="accordionExample">
        @foreach($menu as $id => $m)
            <div class="container">
                <div class="row">
            <div class="col-sm">
                <div class="btn-group dropright" style="margin: 5px;">
                    <div id="heading{{$id}}">
                        <h5 class="mb-0">
                            <button class="btn btn-light collapsed" type="button"
                                    data-toggle="collapse"
                                    data-target="#menu{{$id}}" aria-expanded="false"
                                    aria-controls="{{$id}}"
                                    id="button{{$id}}"
                            >{{$names[$id]}}</button>
                        </h5>
                    </div>
                </div>
                <div id="menu{{$id}}" class="collapse"
                     aria-labelledby="heading{{$id}}"
                     data-parent="#accordionExample">
                    <div class="card-body">
                        @foreach($m as $id2 => $c)
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <button type="button" class="btn btn-outline-primary">{{$names[$id2]}}</button>
                                        <div  class="col-sm">
                                            @foreach($c as $cc)
                                                <div>
                                                    <button type="button" class="btn btn-outline-secondary"> {{$cc['name_category']}}</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm">

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div  class="col-sm">
                @foreach($products[$id] as $product)
                    <button type="button" class="btn btn-outline-info">{{$product['name_product']}}</button><br>
                @endforeach
            </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection


<section class='jumbotron mb-0 pt-3' id='houses'>
    <div class='container'>
        <div class='row justify-content-center mb-4'>
            <h1 class='section-header'>Дома</h1>
        </div>
        <div class='row'>
            <div class='align-self-center col-lg-1 owl-prev d-none d-lg-block'><i class="fas fa-arrow-alt-circle-left fa-3x"></i></div>
            <div class='col-lg-10'>
                <div class='owl-carousel owl-theme owl-drag owl-loaded'>
                    @foreach($params['houses'] as $house)
                        <div class="card text-center">
                            <img class="card-img-top img-rounded owl-lazy show-description"
                                 data-src="{{ asset("storage" . $house['photos'][0]) }}"
                                 alt="Card image cap"
                                 data-id="{{ $house['id'] }}"
                                 data-toggle="modal"
                                 data-target=".modalShowProduct">
                            <div class="card-body">
                                <h5 class="card-title">{{ $house['title'] }}</h5>
                                <p>от {{ $house['price'] }} руб.</p>
                                <button class="btn btn-green show-description"
                                        data-id="{{ $house['id'] }}"
                                        data-toggle="modal"
                                        data-target=".modalShowProduct">Описание
                                </button>
                                @if(Auth::check())
                                    <a href="{{route('editProduct', $house)}}" class="btn btn-success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class='d-inline' action='{{route('deleteProduct', $house)}}' method='POST'>
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button class="btn btn-danger" type='submit'>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class='align-self-center col-lg-1 owl-next d-none d-lg-block'><i class="fas fa-arrow-alt-circle-right fa-3x"></i></div>
        </div>
    </div>
</section>

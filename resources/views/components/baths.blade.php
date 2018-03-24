<section class='jumbotron mb-0 pb-0' id='baths'>
    <div class='container'>
        <div class='row justify-content-center mb-4'>
            <h1 class='section-header'>Бани</h1>
        </div>
        <div class='row'>
            <div class='align-self-center col-lg-1 owl-prev d-none d-lg-block'><i class="fas fa-arrow-alt-circle-left fa-3x"></i></div>
            <div class='col-lg-10'>
                <div class='owl-carousel owl-theme owl-drag owl-loaded'>
                    @foreach($params['baths'] as $bath)
                        <div class="card text-center">
                            <img class="card-img-top img-rounded owl-lazy show-description"
                                 data-src="{{ asset("storage" . $bath['photos'][0]) }}"
                                 alt="Card image cap"
                                 data-id="{{ $bath['id'] }}"
                                 data-toggle="modal"
                                 data-target=".modalShowProduct">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bath['title'] }}</h5>
                                <p>от {{ $bath['price'] }} руб.</p>
                                <button class="btn btn-green show-description"
                                        data-id="{{ $bath['id'] }}"
                                        data-toggle="modal"
                                        data-target=".modalShowProduct">Описание
                                </button>
                                @if(Auth::check())
                                    <a href="{{route('editProduct', $bath)}}" class="btn btn-success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class='d-inline' action='{{route('deleteProduct', $bath)}}' method='POST'>
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

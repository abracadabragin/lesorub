<section class='jumbotron mb-0' id='discounts'>
    <div class='container'>
        <div class='row justify-content-center mb-4'>
            <h1 class='section-header'>Акции</h1>
        </div>
        <div class='row'>
            <div class='align-self-center col-lg-1 owl-prev d-none d-md-block'>
                <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
            </div>
            <div class='col-lg-10'>
                <div class='owl-carousel owl-theme owl-drag owl-loaded'>
                    @foreach($params['discounts'] as $discount)
                        <div class="card text-center">
                            <img class="card-img-top img-rounded owl-lazy"
                                 data-src="{{ asset("storage" . $discount['photos'][0]) }}" alt="Discount product image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $discount['title'] }}</h5>
                                <p>
                                    <small>
                                        <del>{{ $discount['old-price'] }} руб.</del>
                                    </small>
                                    от {{ $discount['price'] }} руб.
                                </p>
                                <button class="btn btn-green btn-description"
                                        data-id="{{ $discount['id'] }}"
                                        data-toggle="modal"
                                        data-target=".modalShowProduct">Описание
                                </button>
                                @if(Auth::check())
                                    <a href="{{route('editProduct', $discount)}}" class="btn btn-success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class='d-inline' action='{{route('deleteProduct', $discount)}}' method='POST'>
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
            <div class='align-self-center col-lg-1 owl-next d-none d-md-block'>
                <i class="fas fa-arrow-alt-circle-right fa-3x"></i>
            </div>
        </div>
    </div>
</section>
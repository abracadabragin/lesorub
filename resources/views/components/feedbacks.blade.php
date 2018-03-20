<section class='jumbotron mb-0' id='feedbacks'>

    <div class='container'>

        <div class='row justify-content-center mb-4'>
            <h1 class='section-header text-center'>Отзывы</h1>
        </div>

        @foreach($params['feedbacks'] as $feedback)
            <div class='row mb-5'>
                <div class="col-12 col-md-10 feedback-align">
                    <div class="card">
                        <div class="card-header d-sm-flex align-items-baseline">
                            <div class='card-header-author mr-sm-auto'>
                                <img class='card-img author-image' src='{{ asset("storage" . $feedback['author_photo']) }}' alt='{{$feedback['author_photo']}}'>
                                <span class='author-name'>{{ $feedback['author_name'] }}</span>
                            </div>
                            <div class='card-header-description ml-sm-auto mt-2 mt-sm-0 text-center'>
                                <button class='btn btn-green btn-feedback' data-id='{{ $feedback['id'] }}'>Смотреть отзыв</button>
                                @if(Auth::check())
                                    <a href="{{route('editFeedback', $feedback)}}" class="btn btn-success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class='d-inline' action='{{route('deleteFeedback', $feedback)}}' method='POST'>
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button class='btn btn-danger btn-feedback' type='submit'>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">

                            <blockquote class="blockquote mb-0">
                                <p>{{ $feedback['text'] }}</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</section>
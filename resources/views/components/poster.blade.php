@php
    $today = today();
@endphp

<div>
   <div class="poster container">
       <div class="poster-filter">
           <div class="filter-btn">
               <div>
                <a href="{{ route('movies.index', ['day' => $today->toDateString()]) }}"
                    class="btn-style_filter {{ request('day')==$today->toDateString() ? 'filter-active' : '' }}">
                    Сегодня
                </a>
               </div>
               <div>
               <a href="{{ route('movies.index', ['day' => $today->copy()->addDay()->toDateString()]) }}"
                  class="btn-style_filter {{ request('day')==$today->copy()->addDay()->toDateString() ? 'filter-active' : '' }}">
                   Завтра
               </a>
               </div>
               @for($i = 2; $i <= 5; $i++)
                   <div>
                       <a href="{{ route('movies.index', ['day' => now()->addDays($i)->toDateString()]) }}"
                          class="btn-style_filter {{ request('day')==now()->addDays($i)->toDateString() ? 'filter-active' : '' }}">
                           {{ now()->addDays($i)->translatedFormat('l, d M') }}
                       </a>
                   </div>
               @endfor

{{--               <div>--}}
{{--               <a href="{{ route('movies.index', ['day' => now()->addDays(3)->toDateString()]) }}"--}}
{{--                  class="btn-style_filter {{ request('day')==now()->addDays(3)->toDateString() ? 'filter-active' : '' }}">--}}
{{--                   {{ now()->addDays(3)->translatedFormat('l, d M') }}--}}
{{--               </a>--}}
{{--               </div>--}}
{{--               <div>--}}
{{--               <a href="{{ route('movies.index', ['day' => now()->addDays(4)->toDateString()]) }}"--}}
{{--                  class="btn-style_filter {{ request('day')==now()->addDays(4)->toDateString() ? 'filter-active' : '' }}">--}}
{{--                   {{ now()->addDays(4)->translatedFormat('l, d M') }}--}}
{{--               </a>--}}
{{--               </div>--}}
{{--               <div>--}}
{{--               <a href="{{ route('movies.index', ['day' => now()->addDays(5)->toDateString()]) }}"--}}
{{--                  class="btn-style_filter {{ request('day')==now()->addDays(5)->toDateString() ? 'filter-active' : '' }}">--}}
{{--                   {{ now()->addDays(5)->translatedFormat('l, d M') }}--}}
{{--               </a>--}}
{{--               </div>--}}
{{--               <div>--}}
           </div>
       </div>
       <div class="poster-block">
           @foreach($movies as $movie)
            <div data-movie-id="{{ $movie->id }}" class="poster-box">
               <div class="poster-img">
                   <div class="premiere"><p>ПРЕМЬЕРА</p></div>
                   <img src="{{ $movie->image }}" alt="">
               </div>
               <div class="poster-content">
                   <h2>{{ $movie->name }}</h2>
                   <div class="genre-block">
                       @forelse($movie->genres as $genre)
                           <div class="genre">
                               <p>{{$genre->name}}</p>
                           </div>
                       @empty
                           <span>Нет жанров</span>
                       @endforelse
                   </div>

               </div>
               <div class="poster-session">
                   @forelse($movie->sessions as $session)
                       <div class="session-item">
                           <div class="time">
                               <h3>{{$session->time}}</h3>
                           </div>
                           <div class="price">
                               <p>{{$session->format}}</p>
                               <p>{{$session->price}} ₸</p>
                           </div>
                           <div class="hall">
                               <p>Зал {{$session->hall}}</p>
                           </div>
                       </div>
                   @empty
                       <div class="not-session_box">
                           <p class="not-session">Нет доступных сеансов</p>
                       </div>
                   @endforelse
               </div>
            </div>
           @endforeach ()
        </div>
   </div>

    <div id="movieModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent">

            </div>
        </div>
    </div>
</div>

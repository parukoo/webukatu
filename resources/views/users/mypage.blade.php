@extends('layouts.app')
@section('content')
<div class="l-wrapper">
  @include('components/header')
  <main class="l-main">
    <section class="p-wrapper">
      <div class="p-container">
        <div class="p-headingWrapper">
          <h2 class="p-flow__title p-heading"><span>M</span>y Page</h2>
          <span class="p-heading-sub">マイページ</span>
        </div>
      
        <div class="p-profile">
          <figure class="p-profile-image">
            @if($user->photo)
              <img src="{{ asset('storage/img/'.$user->photo) }}.jpg">
            @else
              <img src="img/common/img_noimage.jpg">
            @endif
          </figure>
          <div class="p-profile-txtWrapper">
          <h3 class="p-profile-name">{{ $user->name }}<a href="/users/edit"><img class="p-profile-edit" src="img/common/ico_useredit.svg"></a></h3>
            <p class="p-profile-txt">{{ $user->profile }}</p>
          </div>
        </div>
        <div class="p-mystep">
          <ul class="p-mystep-menu">
            <li class="js-tabLink is-active">学習中のSTEP</li>
            <li class="js-tabLink">学習済みのSTEP</li>
            <li class="js-tabLink">登録したSTEP</li>
          </ul>

          <div class="p-mystep-content">

            <div class="p-posts--mypage js-tabPanel is-active">
              @foreach ($joinsteps as $joinstep)
              <div class="p-post--mypage">
                <a href="/steps/{{ $joinstep['step']['id'] }}">
                  <figure class="p-post-image"><img src="img/category/eyecatch0{{ $joinstep['step']['category_id'] }}.jpg" alt=""></figure>
                  <h4 class="p-post-title">{{ $joinstep['step']['title'] }}</h4>
                  <p class="p-post-txt">{{ $joinstep['step']['info'] }}</p>
                  <div class="p-post-score">
                    <div class="p-post-score__graph">
                      <span style="width: {{ $joinstep['complete'] }}%"></span>
                    </div>
                    <p class="p-post-score__text">完了率　{{ $joinstep['complete'] }}%</p>
                  </div>
                </a>
              </div>   
              @endforeach
              @if(!$joinsteps)
                <p>学習中のSTEPはありません。</p>
              @endif
            </div>

            <div class="p-posts--mypage js-tabPanel">
              @foreach ($completesteps as $completestep)
              <div class="p-post--mypage">
                <a href="/steps/{{ $completestep['step']['id'] }}">
                  <figure class="p-post-image"><img src="img/category/eyecatch0{{ $completestep['step']['category_id'] }}.jpg" alt=""></figure>
                  <h4 class="p-post-title">{{ $completestep['step']['title'] }}</h4>
                  <p class="p-post-txt">{{ $completestep['step']['info'] }}</p>
                </a>
                <div class="p-post-score">
                  <div class="p-post-score__graph">
                    <span style="width: {{ $completestep['complete'] }}%"></span>
                  </div>
                  <p class="p-post-score__text">完了率　{{ $completestep['complete'] }}%</p>
                </div>
              </div>   
              @endforeach
              @if(!$completesteps)
                <p>学習済みのSTEPはありません。</p>
              @endif
            </div>

            <div class="p-posts--mypage js-tabPanel">
              @foreach ($registersteps as $registerstep)
                <div class="p-post--mypage">
                  <a href="/steps/{{ $registerstep->id }}/edit" class="p-post-edit"><img src="img/common/ico_edit.svg" class="p-post-edit__link"></a>
                  <a href="/steps/{{ $registerstep->id }}">
                    <figure class="p-post-image"><img src="img/category/eyecatch0{{ $registerstep->category_id }}.jpg" alt=""></figure>
                    <h4 class="p-post-title">{{ $registerstep->title }}</h4>
                    <p class="p-post-txt">{{ $registerstep->info }}</p>
                  </a>
                </div>                  
              @endforeach
              @if(!$registersteps)
                <p>登録したSTEPはありません。</p>
              @endif
            </div>

          </div>
        </div>
      </div>
    </section>
    @include('components/footer')
  </main>
</div>
@endsection
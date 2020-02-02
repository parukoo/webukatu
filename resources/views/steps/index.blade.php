@extends('layouts.app')
@section('content')
<div class="l-wrapper">
  @include('components/header')
  <main class="l-main">
    <section class="p-wrapper">
      <div class="p-container">
        <div class="p-headingWrapper">
          <h2 class="p-heading"><span>S</span>tepとは?</h2>
          <span class="p-heading-sub">人気のSTEPです。</span>
        </div>
        <div>
          <li class="c-btn p-header-btn --login">
            <a href="{{ route('login') }}">ログイン</a>
          </li>
          <li class="c-btn p-header-btn --signup">
            <a href="{{ route('register') }}">新規登録</a>
          </li>
        </div>

      </div>
    </section>
    @include('components/footer')
  </main>
</div>
@endsection
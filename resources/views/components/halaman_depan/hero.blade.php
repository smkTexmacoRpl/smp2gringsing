<?php
$sliders = App\Models\Post::where(['jenis_halaman' => 'slider'])->take(3)->get();

?>

<section class="slider">
  @foreach ($sliders as $index => $slide)
  <div class="slide" style="
            background-image: url('{{ asset('storage/' . $slide->cover_image) }}');
            animation-delay: {{ $index * 5 }}s;
        ">
    <div class="overlay"></div>
    <div class="content">
      <div>
        <h1>{{ $slide->title }}</h1>
        <p>{{ $slide->content }}</p>
      </div>
    </div>
  </div>
  @endforeach
</section>
<x-layout>
        <x-slot name="title">
            <title>All Blogs</title>
        </x-slot>
        @foreach ($blogs as $blog)
        <div class="{{ $loop ->odd ? 'bg-yellow' : ''}}">
        <a href="blogs/{{$blog->slug}}"><h1>{{$blog->title}}</h1></a>
        Published at {{$blog->date}}
        <p>{{$blog->intro}}</p>
        </div>
        @endforeach
    <script src="/app.js"></script>
</x-layout>
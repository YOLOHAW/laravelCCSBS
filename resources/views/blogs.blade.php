<x-layout>
        <x-slot name="title">
            <title>All Blogs</title>
        </x-slot>
        @foreach ($blogs as $blog)
        <div class="{{ $loop ->odd ? 'bg-yellow' : ''}}">
        <a href="blogs/{{$blog->slug}}"><h1>{{$blog->title}}</h1></a>
        <h1><a href="/users/{{$blog->author->username}}">Author - {{$blog->author->name}}</a></h1>
        <p><a href="categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
        Published at {{$blog->created_at->diffForHumans()}}
        <p>{{$blog->intro}}</p>
        </div>
        @endforeach
    <script src="/app.js"></script>
</x-layout>
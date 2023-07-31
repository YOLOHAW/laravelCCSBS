@props(['blogs','categories','currentCategory'])
<section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Blogs</h1>
      <div class="">
        <!-- <select name="" id="" class="p-1 rounded-pill"> -->
        <!-- <select name="" id="" class="p-1 rounded-pill" onchange="location=this.value"> -->
          <!-- <option value="">Filter by Category</option> -->
          <div class="dropdown">
        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    {{isset($currentCategory) ? $currentCategory->name :'Filter By Category'}}
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @foreach($categories as $category)
    <li><a class="dropdown-item" href="/categories/{{$category->slug}}">{{$category->name}}</a></li>
   @endforeach
  </ul>
</div>
          <!-- <option value="/example-route">Example Route</option> -->
        <!-- </select> -->

        <!-- <select name="" id="" class="p-1 rounded-pill mx-3">
          <option value="">Filter by Tag</option>
        </select> -->
      </div>
      <form action="" class="my-3">
        <div class="input-group mb-3">
          <input
            type="text"
            autocomplete="false"
            class="form-control"
            placeholder="Search Blogs..."
          />
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>
        </div>
      </form>
      <div class="row">
      @foreach($blogs as $blog)
        <x-blog-card :blog="$blog"/>
      @endforeach
      </div>
    </section>
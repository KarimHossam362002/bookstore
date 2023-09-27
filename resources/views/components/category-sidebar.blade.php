<div class="nav__categories offcanvas offcanvas-start px-4 py-2" tabindex="-1" id="nav__categories"
    aria-labelledby="nav__categories">
    <div class="nav__categories-header offcanvas-header justify-content-end">
        <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <i class="fa-solid fa-x fa-1x fw-light"></i>
        </button>
    </div>
    <div class="nav__categories-body offcanvas-body pt-0">
        <div class="nav__side-logo mb-2">
            <img class="w-100" src="{{ asset('assets/images/logo.png') }}" alt="">
        </div>
        <ul class="nav__list list-unstyled">
            <li class="nav__link nav__side-link"><a href="{{ route('shop') }}" class="py-3">جميع المنتجات</a></li>
            @foreach ($categories as $category )
            <li class="nav__link nav__side-link"><a href="{{ route('shop') }}" class="py-3">{{ $category->title }}</a></li>
            @endforeach
            {{-- <li class="nav__link nav__side-link"><a href="{{ route('shop') }}" class="py-3">كتب انجليزية</a></li> --}}
        </ul>
    </div>
</div>


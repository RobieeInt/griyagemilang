<section class="blog__section section--padding color-scheme-2 pt-0">
    <div class="container">
        <div class="section__heading text-center mb-30">
            <h2 class="section__heading--maintitle">Postingan Terbaru</h2>
        </div>
        <div class="blog__section--inner blog__swiper--column3 swiper">
            <div class="swiper-wrapper">
                @forelse ($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link display-block"
                                    href="{{ route('blogdetail', $blog->slug) }}"><img
                                        class="blog__thumbnail--img display-block"
                                        src="{{ asset('storage/' . $blog->image) }}" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <ul class="blog__content--meta d-flex">
                                    <li class="blog__content--meta__text">
                                        <svg class="blog__content--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                            width="11.001" height="11.001" viewBox="0 0 11.001 11.001">
                                            <path data-name="Icon awesome-user-circle"
                                                d="M5.5.313a5.5,5.5,0,1,0,5.5,5.5A5.5,5.5,0,0,0,5.5.313Zm0,2.129A1.952,1.952,0,1,1,3.549,4.394,1.952,1.952,0,0,1,5.5,2.442Zm0,7.63A4.25,4.25,0,0,1,2.251,8.559,2.473,2.473,0,0,1,4.436,7.232a.543.543,0,0,1,.157.024A2.937,2.937,0,0,0,5.5,7.41a2.925,2.925,0,0,0,.907-.153.543.543,0,0,1,.157-.024A2.473,2.473,0,0,1,8.75,8.559,4.25,4.25,0,0,1,5.5,10.071Z"
                                                transform="translate(0 -0.313)" fill="currentColor" />
                                        </svg>
                                        {{ $blog->author }}
                                    </li>
                                    <li class="blog__content--meta__text">
                                        <svg class="blog__content--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12.569" height="13.966" viewBox="0 0 12.569 13.966">
                                            <path data-name="Icon material-date-range"
                                                d="M8.69,9.285h-1.4v1.4h1.4Zm2.793,0h-1.4v1.4h1.4Zm2.793,0h-1.4v1.4h1.4Zm1.4-4.888h-.7V3h-1.4V4.4H7.991V3h-1.4V4.4H5.9a1.39,1.39,0,0,0-1.39,1.4L4.5,15.569a1.4,1.4,0,0,0,1.4,1.4h9.776a1.4,1.4,0,0,0,1.4-1.4V5.793A1.4,1.4,0,0,0,15.673,4.4Zm0,11.173H5.9V7.888h9.776Z"
                                                transform="translate(-4.5 -3)" fill="currentColor" />
                                        </svg>
                                        {{-- created_at indonesia format --}}
                                        {{ $blog->created_at->isoFormat('dddd, D MMMM Y') }}
                                    </li>
                                </ul>
                                <h3 class="blog__content--title h4"><a
                                        href="{{ route('blogdetail', $blog->slug) }}">{{ $blog->title }}</a>
                                </h3>
                                <p class="blog__content--desc">
                                    {{-- descrription max 50 character --}}
                                    {{ Str::limit($blog->description, 40) }}
                                </p>
                                <a class="blog__content--btn primary__btn"
                                    href="{{ route('blogdetail', $blog->slug) }}">Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    Belum ada Blog
                @endforelse
            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </div>
</section>

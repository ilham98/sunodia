@extends('persekolah.master')

@section('title', 'Dashboard '.strtoupper($tingkat))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}"> 
    <style>
        html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }

    .swiper-container {
      width: 100%;
      height: 400px;
    }

    .swiper-container > .swiper-wrapper > .swiper-slide {
      text-align: center;
      background: #ffff8d;
      width: calc(40% - 25px);
    }

    .swiper-container > .swiper-wrapper > .swiper-slide.large {
      width: calc(60% - 25px);
    }
    
    .swiper-container-2 {
        width: 100%;
        overflow: hidden;
    }

    .swiper-container-2 > .swiper-wrapper > .swiper-slide {
        width: 100%;
    }

    .swiper-slide .nama {
        font-size: 20px;
        margin-top: -70px;
        padding: 10px 20px;
        width: 100%;
        font-weight: bold;
        background: #ffea00;
        font-family: arial;
    }

    .swiper-slide .juara-ke {
        font-size: 25px;
        margin-top: 3px; 
        font-weight: bold;
        font-family: 'Libre Baskerville', serif;
    }

    .swiper-slide .nama-lomba {
        font-size: 15px;
    }

    .swiper-slide .tingkat {
        font-size: 12px;
    }

    .swiper-slide .image-container {
        max-height: 70%;
        overflow: hidden;
    }

    .swiper-slide img {
        width: 100%;
        z-index: 1;
    }

    .card {
        border: none;
    }
    .date {
        padding: 5px 10px;
        background: #ffff8d;
        color: #f9a825;
        border-radius: 50px;
        font-weight: bold;
    }

    .pswp__caption__center {
        text-align: center;
        font-size: 20px;
    }
    </style>
@endsection

@section('content')
    <div class="container mt-3">
        <div class="card w-100" style="border-radius: 0px">
            <div class="card-body">
                <h5 class="card-title" style="background: #e3f2fd; display: inline-block; padding: 10px 20px; border-radius:30px; color: #2196f3"> Galeri</h5>
                <div>
                        <div class="container">
                            <div class="my-3">
                                @foreach($album as $a)
                                    <div>
                                        <h6 class="mx-3">{{ $a->nama }} - {{ date('d M Y', strtotime($a->created_at)) }}</h6>
                                        <div class="my-gallery d-flex flex-wrap" itemscope itemtype="http://schema.org/ImageGallery">
                                            @foreach($a->photos as $p)
                                                <figure class="mx-3" itemprop="associatedMedia" style="max-width: 400px" itemscope itemtype="http://schema.org/ImageObject">
                                                    <a href="{{ $p->url }}" itemprop="contentUrl" data-size="{{ $p->width }}x{{ $p->height }}">
                                                        <img src="{{ $p->url }}" width="100%" itemprop="thumbnail" alt="Image description" />
                                                    </a>                               
                                                    <figcaption hidden itemprop="caption description">{{ $p->caption }}</figcaption> 
                                                </figure>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $album->links() }}
                            </div>
                        </div>
                            <!-- Root element of PhotoSwipe. Must have class pswp. -->
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                        
                                <!-- Background of PhotoSwipe. 
                                     It's a separate element as animating opacity is faster than rgba(). -->
                                <div class="pswp__bg"></div>
                            
                                <!-- Slides wrapper with overflow:hidden. -->
                                <div class="pswp__scroll-wrap">
                            
                                    <!-- Container that holds slides. 
                                        PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                        Don't modify these 3 pswp__item elements, data is added later on. -->
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div>
                            
                                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                    <div class="pswp__ui pswp__ui--hidden">
                            
                                        <div class="pswp__top-bar">
                            
                                            <!--  Controls are self-explanatory. Order can be changed. -->
                            
                                            <div class="pswp__counter"></div>
                            
                                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                            
                                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            
                                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            
                                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            
                                            <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                            <!-- element will get class pswp__preloader--active when preloader is running -->
                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                  <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                            <div class="pswp__share-tooltip"></div> 
                                        </div>
                            
                                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                        </button>
                            
                                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                        </button>
                            
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>
                            
                                    </div>
                            
                                </div>
                            
                            </div>
                            
                        
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/photoswipe.js') }}"></script>
    <script>
        var initPhotoSwipeFromDOM = function(gallerySelector) {

// parse slide data (url, title, size ...) from DOM elements 
// (children of gallerySelector)
var parseThumbnailElements = function(el) {
    var thumbElements = el.childNodes,
        numNodes = thumbElements.length,
        items = [],
        figureEl,
        linkEl,
        size,
        item;

    for(var i = 0; i < numNodes; i++) {

        figureEl = thumbElements[i]; // <figure> element

        // include only element nodes 
        if(figureEl.nodeType !== 1) {
            continue;
        }

        linkEl = figureEl.children[0]; // <a> element

        size = linkEl.getAttribute('data-size').split('x');

        // create slide object
        item = {
            src: linkEl.getAttribute('href'),
            w: parseInt(size[0], 10),
            h: parseInt(size[1], 10)
        };



        if(figureEl.children.length > 1) {
            // <figcaption> content
            item.title = figureEl.children[1].innerHTML; 
        }

        if(linkEl.children.length > 0) {
            // <img> thumbnail element, retrieving thumbnail url
            item.msrc = linkEl.children[0].getAttribute('src');
        } 

        item.el = figureEl; // save link to element for getThumbBoundsFn
        items.push(item);
    }

    return items;
};

// find nearest parent element
var closest = function closest(el, fn) {
    return el && ( fn(el) ? el : closest(el.parentNode, fn) );
};

// triggers when user clicks on thumbnail
var onThumbnailsClick = function(e) {
    e = e || window.event;
    e.preventDefault ? e.preventDefault() : e.returnValue = false;

    var eTarget = e.target || e.srcElement;

    // find root element of slide
    var clickedListItem = closest(eTarget, function(el) {
        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
    });

    if(!clickedListItem) {
        return;
    }

    // find index of clicked item by looping through all child nodes
    // alternatively, you may define index via data- attribute
    var clickedGallery = clickedListItem.parentNode,
        childNodes = clickedListItem.parentNode.childNodes,
        numChildNodes = childNodes.length,
        nodeIndex = 0,
        index;

    for (var i = 0; i < numChildNodes; i++) {
        if(childNodes[i].nodeType !== 1) { 
            continue; 
        }

        if(childNodes[i] === clickedListItem) {
            index = nodeIndex;
            break;
        }
        nodeIndex++;
    }



    if(index >= 0) {
        // open PhotoSwipe if valid index found
        openPhotoSwipe( index, clickedGallery );
    }
    return false;
};

// parse picture index and gallery index from URL (#&pid=1&gid=2)
var photoswipeParseHash = function() {
    var hash = window.location.hash.substring(1),
    params = {};

    if(hash.length < 5) {
        return params;
    }

    var vars = hash.split('&');
    for (var i = 0; i < vars.length; i++) {
        if(!vars[i]) {
            continue;
        }
        var pair = vars[i].split('=');  
        if(pair.length < 2) {
            continue;
        }           
        params[pair[0]] = pair[1];
    }

    if(params.gid) {
        params.gid = parseInt(params.gid, 10);
    }

    return params;
};

var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
    var pswpElement = document.querySelectorAll('.pswp')[0],
        gallery,
        options,
        items;

    items = parseThumbnailElements(galleryElement);

    // define options (if needed)
    options = {

        // define gallery index (for URL)
        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

        getThumbBoundsFn: function(index) {
            // See Options -> getThumbBoundsFn section of documentation for more info
            var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                rect = thumbnail.getBoundingClientRect(); 

            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
        }

    };

    // PhotoSwipe opened from URL
    if(fromURL) {
        if(options.galleryPIDs) {
            // parse real index when custom PIDs are used 
            // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
            for(var j = 0; j < items.length; j++) {
                if(items[j].pid == index) {
                    options.index = j;
                    break;
                }
            }
        } else {
            // in URL indexes start from 1
            options.index = parseInt(index, 10) - 1;
        }
    } else {
        options.index = parseInt(index, 10);
    }

    // exit if index not found
    if( isNaN(options.index) ) {
        return;
    }

    if(disableAnimation) {
        options.showAnimationDuration = 0;
    }

    // Pass data to PhotoSwipe and initialize it
    gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};

// loop through all gallery elements and bind events
var galleryElements = document.querySelectorAll( gallerySelector );

for(var i = 0, l = galleryElements.length; i < l; i++) {
    galleryElements[i].setAttribute('data-pswp-uid', i+1);
    galleryElements[i].onclick = onThumbnailsClick;
}

// Parse URL and open gallery if it contains #&pid=3&gid=1
var hashData = photoswipeParseHash();
if(hashData.pid && hashData.gid) {
    openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
}
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');

    </script>
@endsection



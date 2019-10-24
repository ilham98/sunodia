<div class="masonry-item col-{{ $col ?? 12 }}">
    <div class="bd bgc-white">
        <div class="peers fxw-nw@lg+ ai-s">
            <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                <div class="layers">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1 text-dark">{{ $title ?? 'Default Title' }}</h6></div>
                    <div class="layer w-100">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
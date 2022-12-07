@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Index</span>
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <script async src="https://telegram.org/js/telegram-widget.js?21" data-telegram-post="telegram/83" data-width="100%">
            </script>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <blockquote class="twitter-tweet">
                <p lang="en" dir="ltr">So… what are we supposed to use now? 🤔<br><br>Mastodon seems like a very
                    fragmented and confusing thing. <br><br>We basically need Twitter for devs and code snippets with syntax
                    highlighting…</p>&mdash; Matt Kingshott (@mattkingshott) <a
                    href="https://twitter.com/mattkingshott/status/1591080007115632640?ref_src=twsrc%5Etfw">November 11,
                    2022</a>
            </blockquote>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <iframe <iframe
                src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fprogrammingwithmosh%2Fposts%2Fpfbid0Ci1LsovaCEwhCzT2mDrPhNdtnTQBGVqEcBNGcofaHHMygkUY7tTjw3TGaniMahZXl&show_text=true&width=500"
                width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                allowfullscreen="true"
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
@endsection

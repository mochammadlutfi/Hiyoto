<div class="widget-category list-category-1-item">
    <h3 class="font-w700 font-size-h3 mb-15">
        <?= __('news.category'); ?>
    </h3>
    <ul class="list-category-1">
        @foreach($data as $d)
        <li>
            <a href="{{ route('post.category', $d->slug) }}">
                <span>{{ $d->translate()->title }}</span>
                <span class="category-count">{{ $d->post()->count() }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
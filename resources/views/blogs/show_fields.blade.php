<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('title', __('messages.post.title').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <p class="fw-bolder fs-6 text-gray-800">{{html_entity_decode($post->title)}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('blog_category', __('messages.post_category.post_category').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <br>
            <div class="post-detail-category-badge">
                @forelse($post->postAssignCategories->pluck('name')->toArray() as $categoryBadges)
                    <span class="badge badge-pill badge-{{ getBadgeColor($loop->index) }}">{{$categoryBadges}}</span>
                @empty
                    {{ __('messages.common.n/a') }}
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('attachment', __('messages.post.image').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <br>
            @if(!empty($post->blog_image_url) && !empty($post->media[0]->id))
                <a href="{{$post->blog_image_url}}" target="_blank">{{ __('messages.common.view') }}</a>&nbsp;
                <a href="{{route('download.post').'/'. $post->media[0]->id}}">{{ __('messages.common.download') }}</a>
            @else
                {{ __('messages.common.n/a') }}
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('notes', __('messages.post.description').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <p class="fw-bolder fs-6 text-gray-800">{!! !empty($post->description)? nl2br($post->description): __('messages.common.n/a') !!}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <br>
            <span data-bs-toggle="tooltip" data-bs-placement="right"
                  title="{{ date('jS M, Y', strtotime($post->created_at)) }}"
                  class="fw-bolder fs-6 text-gray-800">{{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <br>
            <span data-bs-toggle="tooltip" data-bs-placement="right"
                  title="{{ date('jS M, Y', strtotime($post->updated_at)) }}"
                  class="fw-bolder fs-6 text-gray-800">{{ $post->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>

@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Admin Blog Posts</h1>

    @if($blogPosts->isEmpty())
        <p>No blog posts available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Publish Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogPosts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->publish_date ? \Carbon\Carbon::parse($post->publish_date)->format('Y-m-d') : 'N/A' }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#blogModal{{ $post->id }}">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Modals -->
@foreach($blogPosts as $post)
    <div class="modal fade" id="blogModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel{{ $post->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blogModalLabel{{ $post->id }}">Blog Post Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>{{ $post->title }}</h2>
                    <p><strong>Author:</strong> {{ $post->author->name }}</p>
                    <p><strong>Category:</strong> {{ $post->category->name }}</p>
                    <p><strong>Status:</strong> {{ $post->status }}</p>
                    <p><strong>Publish Date:</strong> {{ $post->publish_date ? \Carbon\Carbon::parse($post->publish_date)->format('Y-m-d') : 'N/A' }}</p>
                    <p><strong>Created At:</strong> {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
                    <p><strong>Updated At:</strong> {{ $post->updated_at->format('Y-m-d H:i:s') }}</p>
                    <h3>Content:</h3>
                    <div>{!! $post->content !!}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
        });
    });
</script>
@endpush

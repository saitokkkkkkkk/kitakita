@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex flex-column justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                @foreach ($article->tags as $tag)
                                    <span class="badge bg-primary badge-rounded">#{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $article->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

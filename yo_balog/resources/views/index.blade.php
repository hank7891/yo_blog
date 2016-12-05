@extends('balog')
@section('content')
<div class="col-md-9" >
    @foreach ($article_data as $key => $article)
    	<div class="col-md-12 panel panel-default">
    		{{-- 文章標題/Article title --}}
    		<a class="text-primary" href="{{route('article.show',['id'=>$article->id])}}" >
    		 	<h1>{{$article->title}}</h1>
    		 </a>
			<div class="blog-post-meta">
			     <div class="col-md-8">
			        分類：
		            <span class="label label-default">
		              <a style="color:white;" href="">
		                  {{$article->category->name}}
		              </a>
		            </span>&nbsp
			        標籤:
			        @foreach ($article->tag as $key => $tag)
			            <span class="label label-default">
			              <a style="color:white;" href="">
			                  {{$tag->name}}
			              </a>&nbsp
			            </span>&nbsp			        	
			        @endforeach
			    </div>
			    <div class='col-md-3 pull-right'>
			    	時間: &nbsp {{$article->created_at}}
			    </div>
			</div>
			<div class="col-md-12">
				<hr style="margin:10px 0;" />
				<p class='lead text-muted'>
					{{str_limit($article->body, $limit = 100, $end = '...')}}
				
				</p>
			</div>			
			<div class='pull-right'>
				 {{-- 留言數 --}}
         		 {{$article->message->count()}}&nbsp則留言
			</div>
    	</div>
    @endforeach
	<div class="col-md-6 pull-right">
	    {!! $article_data->render() !!}
	</div>
</div>

@stop

@extends('balog')
@section('content')
	<div class="col-md-9" >
		<div >
	         <h1>
	            {{$article_data->title}}
	        </h1>			
		</div>

    	<div class="blog-post-meta">
		     <div class="col-md-8">
		        分類：
	            <span class="label label-default">
	              <a style="color:white;" href="">
	                  {{$article_data->category->name}}
	              </a>
	            </span>&nbsp
		        標籤:
		        @foreach ($article_data->tag as $key => $tag)
		            <span class="label label-default">
		              <a style="color:white;" href="">
		                  {{$tag->name}}
		              </a>&nbsp
		            </span>&nbsp			        	
		        @endforeach
		    </div>
		    <div class='col-md-3 pull-right'>
		    	時間: &nbsp {{$article_data->created_at}}
		    </div>
		</div>

		<div class="col-md-12 center-block">
			<hr style="margin:20px 0;" />
			<p class='lead text-muted'>
				{{$article_data->body}}
			
			</p>
		</div>	

	</div>
@stop

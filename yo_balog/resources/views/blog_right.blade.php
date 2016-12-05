{{-- right bar --}}
<div class="col-md-3 pull-right">
	<h1>分類</h1>
	<div class="well">		
		@foreach ($category_bar as $key => $value)
			<h3>
				<ul>
					<li>
						<a href="{{route('categorie.show',['category_id'=>$value->id])}}">{{$value->name}}</a>
					</li>
				</ul>
			</h3>
		@endforeach
	</div>
	<h1>標籤</h1>
	<div class="well">
		@foreach ($tag_bar as $key => $value)
			<h3>
				<ul>
					<li>
						<a href="{{route('tag.show',['name'=>$value->name])}}">{{$value->name}}</a>
					</li>
				</ul>
			</h3>
		@endforeach
	</div>

	<h1>熱門文章</h1>
	<div class="well">
		@foreach ($article_hot as $key => $value)
			<h3>
				<ul>
					<li>
						<a href="{{route('article.show',['id'=>$value->id])}}">{{$value->title}}</a>
					</li>
				</ul>
			</h3>
		@endforeach
	</div>
</div>
@extends('app')
@section('content')
<div class="container">

	<navigation></navigation>
	<nav class="nav">
	<router-link to="/posts" class="nav-item" tag="li"> <a> Posts  </a> </router-link>
	<router-link to="/posts/create" class="nav-item" tag="li"> <a> create post </a> </router-link> 
	</nav>
	<router-view> </router-view>
</div>
@endsection
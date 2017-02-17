<template>
	<div>
		<div class="box" v-for="post in posts">
			<article class="media">
				<div class="media-left">
					<figure class="image is-64x64">
						<img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
					</figure>
				</div>
				<div class="media-content">
					<div class="content">
						<p>
							<strong>John Smith</strong> <small>@johnsmith</small> <small>{{ fromNow(post.created_at) }} </small>
							<br>
							{{  post.name }}<br/>
						</p>
					</div>
					<nav class="level">
						<div class="level-left">

						<a :href="editUrl(post.id)" class="level-item">
							<span class="icon is-small"><i class="fa fa-pencil-square-o"></i></span>
						</a>

						<a class="level-item">
							<span class="icon is-small"><i class="fa fa-retweet"></i></span>
						</a>
						<a class="level-item">
							<span class="icon is-small"><i class="fa fa-heart"></i></span>
						</a>

						</div>
					</nav>
				</div>
			</article>
		</div>	
	</div>

</template>
<script>
	export default{

		data() {
			return {
				posts: ""
			} 

		},
		computed:{

		},
		methods: {
			editUrl(id){
				return `#/posts/${id}/edit`;
			},
			fromNow(timestamp){
				return moment(timestamp).fromNow();
			}	
		},
		mounted() {
			console.log('hello');
			axios.get('posts')
			.then(response => {
				this.posts = response.data.data;
				console.log(response.data.data[0]);
			})
			.catch(error => console.log(error));
		}
	}
</script>
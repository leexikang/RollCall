<template>
	<div>
	<h1> hello darling </h1>

	<post-form @fetch-data="getData()":post-data="id"></post-form>
	</div>
</template>
<script>
import PostForm from './PostForm';
import Post from '../core/post';

export default{
	data() {
		return{
			id: "",
			post: {}
		}
	},
	methods: {
		getData(){
			return 'bar';
		}
	},
	components: {
		'post-form': PostForm
	},
	created(){
		this.id = this.$route.params.id;
		axios.get(`posts/${this.id}/edit`)
		.then(response => {
			this.post = new Post(response.data.data);
			console.log(this.post.name);
		}).catch(error => console.log(error));
		console.log(this.id);
	}
}
</script>
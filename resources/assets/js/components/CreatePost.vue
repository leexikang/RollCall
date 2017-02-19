<template>
	<div>
	<h1> hello darling </h1>
	<post-form @fetch-data="getData()" :post-data="form"></post-form>
	</div>
</template>
<script>
import PostForm from './PostForm';
import Form from '../core/form';
import Post from '../core/post';

export default{
	data() {
		return{
			id: "",
			post: {},
			form:  new Form({
				'name': ""
			})
		}
	},
	methods: {
		getData(){
			return 'bar';
		}
	},
	components: {
		'post-form': PostForm
	}

}
</script>
<template>
	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

		<label class="label">Name</label>
		<p class="control">
			<input class="input is-primary" name=
			"name" type="text"  v-model="form.name" placeholder="Text input">
		</p>	
		{{ getPostData }}
		<span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
		<button type="submit" class="button" :disabled="form.errors.any()"> Create </button>
	</form>

</template>
<script>
import Form from '../core/form';

	export default {
		props: ['postData'],
		data() {
			return{
				name: "",
				form: new Form({
					name: ''
				})
			}
		},
		computed:{
			getPostData(){
				return this.postData.name;
			}
		},
		methods:{
			onSubmit(){
				this.form.submit('post', '/posts')
				.then(data => console.log(data))
				.catch(errors => console.log(errors));
			}
		},
		created(){
			this.$emit('fetch-data');
			if(this.$route.params.id){
				console.log('edit');
				axios.get(`posts/1/edit`)
				.then(response => {
					this.form.name = response.data.data.name;
				}).catch(error => console.log(error));
				console.log(this.id);
			}

		}
	}
</script>

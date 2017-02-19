<template>
	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

		<label class="label">Name</label>
		<p class="control">
			<input class="input is-primary" name=
			"name" type="text"  v-model="form.name" placeholder="Text input">
		</p>	
		<span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
		<button type="submit" class="button" :disabled="form.errors.any()"> Create </button>
	</form>

</template>
<script>
import Form from '../core/form';

	export default {
		data() {
			return{
				action: "post",
				name: "",
				url: "/posts",
				form: new Form({
					'name': ""
				}),
			}
		},
		methods:{

			onSubmit(){
				this.form.submit(this.action, this.url)
				.then(data => {
					if(this.action = 'put' ){
						postUpdated();
					}else{
						postCreated();
					}
				})
				.catch(errors => console.log(errors));
			},
			postUpdated(){
				console.log("Post Has been updated");
			},
			postCreated(){
				console.log("Post has been created")
			}

		},
		created(){
			let id = null;
			if(id = this.$route.params.id){
				this.url = `/posts/${id}/edit`;
				this.action = 'put';
				axios.get(this.url)
				.then(response => {
					this.form.name = response.data.data.name;
				})
				.catch(errors => console.log(errors));
			}

		}
	}
</script>

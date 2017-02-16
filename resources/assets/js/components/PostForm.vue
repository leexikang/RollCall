<template>
	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

		<label class="label">Name</label>
		<p class="control">
			<input class="input is-primary" name=
			"name" type="text" v-model="form.name" placeholder="Text input">
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
				name: "",
				form: new Form({
					name: ''
				})
			}
		},

		methods:{
			onSubmit(){
				this.form.submit('post', '/posts')
				.then(data => console.log(data))
				.catch(errors => console.log(errors));
			}
		}

	}
</script>

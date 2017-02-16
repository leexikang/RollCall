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
class Errors{
	constructor(){
		this.errors = {}
	}

	get(field){
		if(this.errors[field]){
			return this.errors[field][0];
		}
	}
	has(field){
		return  this.errors.hasOwnProperty(field);
	}

	any(){
		 return Object.keys(this.errors).length > 0;
	}
	clear(field)
	{
		if (field){
			delete this.errors[field];
			return;
		}
		this.errors = {};
	}

	getAll(){
		return this.errors;
	}

	record(errors){
		this.errors = errors;
	}
}

class Form{
	constructor(data){

		this.originalData = data;

		for(let field in data){
			this[field] = data[field];
		}

		this.errors = new Errors();
	}

	reset(){
		for(field in this.originalData)
		{
			this[field] = "";
		}

	}

	data(){
		let data = Object.assign({}, this)
		delete data.originalData;
		delete data.errors;
		return data;

	}

	submit(requestType, url){

		axios[requestType](url, this.data())
		.then(this.onSuccess.bind(this))
		.catch(this.Onfail.bind(this))
	}

	onSuccess(response){
		alert(response.data.message);
		this.errors.clear();

	}
	Onfail(error){
		alert('errors');
	//	this.errors.record(error.response.data);
	}
}

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
			}
		}

	}
</script>

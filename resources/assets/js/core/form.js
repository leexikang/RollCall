import Errors from '../core/errors';

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
		this.errors.clear();
	}

	data(){
		let data = Object.assign({}, this)
		delete data.originalData;
		delete data.errors;
		return data;

	}

	submit(requestType, url){
		return new Promise((resolve, reject) =>{

			axios[requestType](url, this.data())
			.then(response => {
				this.onSuccess(response.data);
				resolve(response.data);
			})
			.catch(error => {
				this.Onfail(error);
				reject(error.response.data);
			});

		});
		
	}

	onSuccess(response){
		alert(response.data.message);
		this.reset();

	}
	Onfail(errors){
		this.errors.record(errors.response.data);
	}
}

export default Form;
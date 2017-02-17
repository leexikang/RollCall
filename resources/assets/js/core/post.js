class Post
{
	constructor(data){
		for(let field in data){
			this[field] = data[field];
		}
	}
}

export default Post
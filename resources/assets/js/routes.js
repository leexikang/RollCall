import router from 'vue-router';

let routes =[

	{
		path: '/posts',
		component: require('./components/Posts')
	},
	{
		path: '/posts/create',
		component: require('./components/PostForm')
	},
	{
		path: '/posts/:id/edit',
		component: require('./components/PostEdit')
	}
];

export default new router({
	routes,
	linkActiveClass: 'is-active'
});


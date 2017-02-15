<template>
	<form>

		<label class="label">Name</label>
		<p class="control">
			<input class="input is-primary" type="text" placeholder="Text input">
		</p>	
		<button type="submit" class="button" @on> Submit </button>
	</form>

</template>
<script>
	export default {
		data() {
			return{
			 user: "hello"	
			}
		}

	}
</script>

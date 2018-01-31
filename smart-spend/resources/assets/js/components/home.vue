<template>
	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
    		<h1 class="display-4">{{name}}</h1>
    		<p class="lead">{{lead}}</p>
  		</div>
	</div>
</template>

<script>
export default {

  name: 'home',

  data () {
    return {

    }
  },

  props:{
  	name:String,
  	lead:String
  }
}
</script>

<style lang="css" scoped>
</style>
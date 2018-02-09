<template>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#">Smart Spend</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
			<span class="navbar-toggler-icon"></span>
  		</button>
		<div class="collapse navbar-collapse" id="collapse">
    		<ul class="navbar-nav ml-auto">
	      		<li class="nav-item active">
	        		<a class="nav-link" href="#">Home</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="#">Minhas Despesas</a>
	      		</li>
      			<li class="nav-item">
	        		<a class="nav-link" href="#">Contas por mês</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="#">Sair</a>
	      		</li>
    		</ul>
  		</div>
	</nav>
</template>

<script>
export default {

  name: 'navbar',

  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>
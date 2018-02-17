<template>
	<div class="well">
		<form @submit.prevent="cadastrarGanho()">
			<div class="form-row">
				<div class="col form-group">
					<input type="text" class="form-control" placeholder="Título" v-model="titulo" required>	
				</div>
				<div class="col form-group">
					<input type="number" step="0.01" class="form-control" placeholder="Valor" v-model="valor" required>	
				</div>
			</div>
			<p class="text-right">
				<button class="btn btn-success">Cadastrar</button>
			</p>
		</form>
	</div>
</template>

<script>
export default {

  name: 'create',

  data () {
    return {
    	titulo:'',
    	valor:''
    }
  },
  methods:{
  	cadastrarGanho(){
  		let dataForm = {
  			'name':this.titulo,
  			'value':this.valor
  		}
  		axios.post('/api/ganhos/cadastrar', dataForm)
  		.then(function(response){
  			console.log(response)
  		}).catch(function (error){
  			console.log(error)
  		})
  	},
  }
}
</script>

<style lang="css" scoped>
</style>
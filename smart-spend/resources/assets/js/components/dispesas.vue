<template>
	<div class="container">
		<div class="well">
			<form @submit.prevent="createDispesa()">
				<div class="form-row">
					<div class="form-group col">
						<input type="text" v-model="dispesa" class="form-control" placeholder="Dispesa">
					</div>
					<div class="form-group col">
						<input type="number"v-model="valor"  step="0.01" class="form-control" placeholder="Valor">
					</div>
				</div>
				<p class="text-right">
					<button class="btn btn-success">Cadastrar dispesa</button>
				</p>
			</form>
		</div>
		<hr>
		<p class="text-right" v-if="totalDisp > 0">
			<strong>Total:</strong>
			<span>{{totalDisp | money}}</span>
		</p>
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">Dispesa</th>
					<th scope="col">Valor</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="disp in dispesas">
					<td>{{disp.name}}</td>
					<td>{{disp.value | money}}</td>
					<td>
						<button class="btn btn-outline-warning">Editar</button>
						<button class="btn btn-outline-danger">Deletar</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
export default {

  name: 'dispesas',

  data () {
    return {
    	dispesa: '',
    	valor: '',
    	dispesas:[],
    }
  },

  created:function(){
  	this.getDispesas()
  },

  computed:{
  	totalDisp: function(){
  		let total = 0;
      	for (let i = 0; i < this.dispesas.length; i++){
      		total += parseInt(this.dispesas[i].value);
      	}
      	return total;
  	}
  },

  methods:{
  	createDispesa(){
  		if(this.dispesa == "" || this.valor == "" || this.valor == 0){
  			return
  		}
  		let disp = {
  			name:this.dispesa,
  			value:this.valor
  		}
  		
  		let vm = this
  		axios.post('/api/dispesa/cadastrar', disp)
  		.then(function (response) {
  			vm.dispesa = ''
  			vm.valor = ''
  			vm.getDispesas()
  		})
  		.catch(function (error) {
    		console.log(error);
  		});
  	},

  	getDispesas(){
  		const vm = this
  		axios.get('/api/dispesa/')
  		.then(function(response){
  			vm.dispesas = response.data
  		})
  		.catch(function(error){
  			console.log(error)
  		})
  	}
  },

  filters:{
  	money:function(value){
  		if(!value){
  			return
  		}
  		return Number(value).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
  	}
  }
}
</script>

<style lang="css" scoped>
</style>
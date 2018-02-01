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
		<p class="text-right">
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
					<td>{{disp.nome}}</td>
					<td>{{disp.valor | money}}</td>
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

  computed:{
  	totalDisp: function(){
  		let total = 0;
      	for (let i = 0; i < this.dispesas.length; i++){
      		total += parseInt(this.dispesas[i].valor);
      	}
      	return total;
  	}
  },

  methods:{
  	createDispesa(){
  		if(this.dispesa == "" || this.valor == "" || this.valor == 0){
  			return
  		}
  		var disp = {
  			nome:this.dispesa,
  			valor:this.valor
  		}
  		this.dispesas.push(disp)
  		this.dispesa = ''
  		this.valor = ''
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
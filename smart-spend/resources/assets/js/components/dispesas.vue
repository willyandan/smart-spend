<template>
	<div>
    <div class="container">
      <div class="well">
        <form @submit.prevent="createDispesa()">
          <div class="form-row">
            <div class="form-group col">
              <input type="text" v-model="dispesa" class="form-control" placeholder="Despesa">
            </div>
            <div class="form-group col">
              <input type="number"v-model="valor"  step="0.01" class="form-control" placeholder="Valor">
            </div>
          </div>
          <p class="text-right">
            <button class="btn btn-success">Cadastrar Despesa</button>
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
            <th scope="col">Despesa</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="disp in dispesas">
            <td>{{disp.name}}</td>
            <td>{{disp.value | money}}</td>
            <td>
              <button class="btn btn-outline-warning" @click="editDispesa(disp)">Editar</button>
              <button class="btn btn-outline-danger" @click="deleteDispensa(disp.id)">Deletar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal" tabindex="-1" id="modal-edit" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Despesa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" v-model="editName">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Valor</label>
                    <input type="text" class="form-control" v-model="editVaule">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" @click="updateDispesa()">Salvar</button>
          </div>
        </div>
      </div>
    </div>
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
      editName:'',
      editVaule:'',
      editId:0
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
  	},

    editDispesa(disp){
      this.editVaule = disp.value
      this.editName = disp.name
      this.editId = disp.id
      $('#modal-edit').modal('show')
    },

    updateDispesa(){
      let dataform = {
        'name':this.editName,
        'value':this.editVaule
      }
      const vm = this
      axios.post('/api/dispesa/atualizar/'+this.editId, dataform)
        .then(function(response){
          if(response.data.message == "success"){
            vm.getDispesas()
          }
          $('#modal-edit').modal('hide')
        })
        .catch(function(error){

        })
    },

    deleteDispensa(id){
      const vm = this
      axios.post('/api/dispesa/deletar/'+id)
      .then(function(response){
        if(response.data.message == "success"){
          vm.getDispesas()
        }
      }).catch(function(error){
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
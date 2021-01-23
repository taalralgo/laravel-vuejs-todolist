<template>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Ajouter
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name <span style="color: #ff2c18">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Name" v-model="name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="store">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              name: ''
          }
        },
        methods: {
            store() {
                if(this.name.length < 1) {
                    alert('Le champ est vide')
                    return false
                }
                var data = {
                    name: this.name
                };
                axios.post('/task/add', data)
                .then(response => {
                    this.name = '';
                    this.$emit('task-added', response);
                })
                .catch(error => alert("Erreur dans add task"))
            }
        }
    }
</script>

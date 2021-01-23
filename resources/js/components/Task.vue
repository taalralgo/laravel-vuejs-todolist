<template>
    <div class="row py-3">
        <div class="col">
            <div class="row py-3">
                <div class="col">
                    <add-task @task-added="refresh"></add-task>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="task in tasks.data"
                    :key="task.id">{{ task.name }}
                    <div>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit"
                                @click="getTask(task.id)">
                            Modifier
                        </button>
                        <button type="button" class="btn btn-danger" @click="deleteTask(task.id)">
                            Supprimer
                        </button>
                    </div>
                </li>
                <edit-task v-bind:editTask="editTask" @task-edited="refresh"></edit-task>
            </ul>
            <pagination class="py-3" :data="tasks" @pagination-change-page="getResults">
                <span slot="prev-nav">&lt;</span>
                <span slot="next-nav">&gt;</span>
            </pagination>
        </div>
    </div>
</template>

<script>
    import NavBar from "./NavBar";

    export default {
        name: "Task",
        components: {NavBar},
        data() {
            return {
                tasks: {},
                editTask: '',
            }
        },

        created() {
            axios.get('/tasks')
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => alert("Une erreur"))
        },

        mounted() {
            this.getResults();
        },

        methods: {
            getResults(page = 1) {
                axios.get('/tasks?page=' + page)
                    .then(response => {
                        this.tasks = response.data;
                    });
            },
            refresh(tasks) {
                this.tasks = tasks.data
            },
            getTask(task_id) {
                axios.get('/task/edit/' + task_id)
                    .then(response => {
                        this.editTask = response.data;
                    });
            },
            deleteTask(task_id) {
                axios.delete('/task/delete/' + task_id)
                    .then(response => {
                        this.tasks = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>

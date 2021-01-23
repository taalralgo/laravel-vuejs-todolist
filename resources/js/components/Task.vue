<template>
    <div class="row py-3">
        <div class="col">
            <div class="row py-3">
                <div class="col">
                    <add-task @task-added="refresh"></add-task>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in tasks.data" :key="task.id"><a href="#">{{ task.name }}</a>
                </li>
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
                tasks: {}
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
            }
        }
    }
</script>

<style scoped>

</style>

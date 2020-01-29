<template>
    <div class="users">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <ul v-if="users">
            <li v-for="index in getData" v-bind:key="index.id">
                <strong>Name:</strong> {{ index.name }},
                <strong>Email:</strong> {{ index.email }}
            </li>
        </ul>
        <pagination :data="users" @pagination-change-page="fetchData"></pagination>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loading: false,
            users: null,
            error: null,
            getData: {},
        };
    },
    created() {
        this.fetchData();
        this.get();
    },
    methods:{
	    fetchData(page = 1) {
        this.error = this.users = null;
        this.loading = true;
        axios.get('http://127.0.0.1:8000/api/users?page=' + page).then(response => {
            this.loading = false;
            this.users = response.data;
        });
        },
        get(){
            axios.get('http://127.0.0.1/api/users').then(
                response => {
                    this.getData = response.data;
                    }
                )
        },
    },
}
</script>

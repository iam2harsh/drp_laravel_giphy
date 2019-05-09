<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Search GIFs</div>

                    <div class="card-body">
                        <input v-model="query">
                        <button type="button" class="btn btn-primary" v-on:click="search">Search</button>
                        <table class="table" v-show="results">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">GIF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in results">
                                <th scope="row">{{index+1}}</th>
                                <td>{{item.title}}</td>
                                <td><img :src="item.images.fixed_height.url"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                results: null,
                query: '',
            }
        },
        mounted() {
            axios.get('/api/gifs/trending').then((response)=>{
                if (response.data.meta.status == 200) {
                }
            });
        },
        methods: {
            search(){
                axios.post('/api/gifs/search', {'query' : this.query}).then((response)=>{
                if (response.data.meta.status == 200) {
                    this.results = response.data.data;
                }
            });
            }
        }
    }
</script>
